# CLAUDE.md

## Project
WordPress theme `vua-baobi` (VUA Bao Bi Cong Nghiep) — landing page corporate, navy + gold.

## DEPLOYMENT

### Pipeline
Claude Code → push branch `claude/*` → GitHub Actions auto-merge vào `main` → Webhook deploy lên cPanel (`baobidep.webngon.net`).

### Files
- `.github/workflows/auto-merge-claude.yml` — auto-merge workflow
- `deploy-webhook.php` — webhook handler (HMAC-SHA256 verify + self-heal + opcache_reset)

### Branch convention
- Develop: `claude/<feature-name>`
- Push lên `claude/*` → auto merge → auto deploy
- KHÔNG push trực tiếp lên `main`

### Webhook
- URL: `https://baobidep.webngon.net/wp-content/themes/vua-baobi/deploy-webhook.php`
- Secret: lưu trong `deploy-webhook.php` (sync với GitHub Settings → Webhooks)
- Server path: `/home/cogfjvaa/baobidep.webngon.net/wp-content/themes/vua-baobi`
- Timezone: `Asia/Ho_Chi_Minh`

### Lưu ý
- Webhook trả 2 delivery / push (claude/* skip, main deploy)
- Nếu server bị detached HEAD → webhook tự fix (self-heal nhánh)
- KHÔNG sửa `deploy-webhook.php` trừ khi cần — file tự deploy chính nó
- Actions fire test: 2026-05-26
