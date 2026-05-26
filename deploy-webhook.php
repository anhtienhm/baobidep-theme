<?php
/**
 * GitHub Webhook - Auto Deploy
 *
 * Nhận push event, verify HMAC-SHA256, chạy git pull --ff-only origin main.
 * Self-heal bằng hard reset về origin/main nếu fast-forward fail.
 */
date_default_timezone_set( 'Asia/Ho_Chi_Minh' );

$secret = '4e3049ab4b8520a3ab0f5d0cb12107dec1636b93eba240951643052e6fd64e96';

$payload   = file_get_contents( 'php://input' );
$signature = $_SERVER['HTTP_X_HUB_SIGNATURE_256'] ?? '';

if ( $signature ) {
    $expected = 'sha256=' . hash_hmac( 'sha256', $payload, $secret );
    if ( ! hash_equals( $expected, $signature ) ) {
        http_response_code( 403 );
        die( json_encode( [ 'success' => false, 'error' => 'Invalid signature' ] ) );
    }
}

// Skip non-main pushes (auto-merge sends 2 events per push: claude/* and main)
$event = $_SERVER['HTTP_X_GITHUB_EVENT'] ?? '';
if ( $event === 'push' ) {
    $data   = json_decode( $payload, true );
    $branch = $data['ref'] ?? '';
    if ( $branch !== 'refs/heads/main' ) {
        header( 'Content-Type: application/json' );
        die( json_encode( [
            'success' => true,
            'skipped' => true,
            'reason'  => "Not main branch: $branch",
        ] ) );
    }
}

$repo_path = '/home/cogfjvaa/baobidep.webngon.net/wp-content/themes/vua-baobi';
$repo_arg  = escapeshellarg( $repo_path );

$output = [];
$return = 0;
exec( "cd $repo_arg && git checkout main 2>&1; git pull --ff-only origin main 2>&1", $output, $return );

// Self-heal: if fast-forward fails (e.g. server in detached HEAD or has local commits)
$fallback_used = false;
if ( $return !== 0 ) {
    $fallback_used = true;
    $output[]      = '--- fast-forward failed, attempting self-heal ---';
    $recover       = [];
    $recover_ret   = 0;
    exec( "cd $repo_arg && git fetch origin main 2>&1 && git checkout -f -B main origin/main 2>&1 && git reset --hard origin/main 2>&1", $recover, $recover_ret );
    $output = array_merge( $output, $recover );
    $return = $recover_ret;
}

// Reset opcache so PHP picks up new code
if ( function_exists( 'opcache_reset' ) ) {
    opcache_reset();
}

header( 'Content-Type: application/json' );
echo json_encode( [
    'success'       => $return === 0,
    'fallback_used' => $fallback_used,
    'output'        => implode( "\n", $output ),
    'time'          => date( 'Y-m-d H:i:s' ),
] );
