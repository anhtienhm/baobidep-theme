#!/usr/bin/env python3
# Concept set 2: CROWN resting ON a packaging box (vuong mien doi len chiec hop)
import cairosvg, os
NAVY="#0D255C"; NAVY2="#1A3C86"
G_HI="#FFE08A"; G_LT="#FFD24D"; G_MD="#F5B30B"; G_DK="#C98A06"; G_DD="#9A6A04"
OUT=os.path.dirname(os.path.abspath(__file__))
GRAD=f'''<linearGradient id="gold" x1="0" y1="0" x2="0" y2="1">
<stop offset="0" stop-color="{G_HI}"/><stop offset=".55" stop-color="{G_LT}"/>
<stop offset="1" stop-color="{G_MD}"/></linearGradient>
<linearGradient id="goldS" x1="0" y1="0" x2="1" y2="1">
<stop offset="0" stop-color="{G_LT}"/><stop offset="1" stop-color="{G_DK}"/></linearGradient>'''

def crown(x,y,w,h,fill="url(#gold)",jewel=NAVY):
    seg=w/3
    p=(f'M{x},{y+h} L{x+0.07*w},{y+h*0.5} '
       f'L{x+0.5*seg},{y+h*0.10} L{x+1.0*seg},{y+h*0.46} '
       f'L{x+1.5*seg},{y} L{x+2.0*seg},{y+h*0.46} '
       f'L{x+2.5*seg},{y+h*0.10} L{x+w-0.07*w},{y+h*0.5} '
       f'L{x+w},{y+h} Z')
    band=f'<rect x="{x}" y="{y+h-0.02*h}" width="{w}" height="{h*0.16}" rx="{h*0.05}" fill="{fill}"/>'
    jew=''
    for i,px in enumerate((x+0.5*seg,x+1.5*seg,x+2.5*seg)):
        py=(y+h*0.10) if i!=1 else y
        jew+=f'<circle cx="{px}" cy="{py}" r="{h*0.09}" fill="{fill}"/>'
    bj=''
    for px in (x+0.28*w,x+0.5*w,x+0.72*w):
        bj+=f'<circle cx="{px}" cy="{y+h+0.045*h}" r="{h*0.05}" fill="{jewel}"/>'
    return f'<path d="{p}" fill="{fill}"/>{band}{jew}{bj}'

# ---- V1: isometric SEALED carton + crown on top, tape cross ----
def iso_box(cx,ty,s,sh):
    A=(cx,ty);B=(cx+s,ty+s*0.5);C=(cx,ty+s);D=(cx-s,ty+s*0.5)
    bC=(cx,ty+s+sh);bL=(cx-s,ty+s*0.5+sh);bR=(cx+s,ty+s*0.5+sh)
    top=f'<path d="M{A[0]},{A[1]} L{B[0]},{B[1]} L{C[0]},{C[1]} L{D[0]},{D[1]} Z" fill="{G_HI}"/>'
    right=f'<path d="M{B[0]},{B[1]} L{C[0]},{C[1]} L{bC[0]},{bC[1]} L{bR[0]},{bR[1]} Z" fill="{G_MD}"/>'
    left=f'<path d="M{D[0]},{D[1]} L{C[0]},{C[1]} L{bC[0]},{bC[1]} L{bL[0]},{bL[1]} Z" fill="{G_DK}"/>'
    # flap seam on top (A->C) + tape down the front
    seam=f'<path d="M{A[0]},{A[1]} L{C[0]},{C[1]}" stroke="{G_DD}" stroke-width="2.5" opacity=".5"/>'
    tape=f'<path d="M{C[0]},{C[1]} L{bC[0]},{bC[1]}" stroke="{G_HI}" stroke-width="9" opacity=".45"/>'
    return top+right+left+seam+tape

def concept_1(navy=True,wordmark=False):
    bg=NAVY if navy else "#fff"
    W,H=(560,260) if wordmark else (300,300)
    box=f'<g transform="translate({150 if not wordmark else 95},{150})">{iso_box(0,0,62,46)}</g>'
    cr=f'<g transform="translate({(150 if not wordmark else 95)},{112})">{crown(-48,0,96,58)}</g>'
    extra=''
    if wordmark:
        sw=15;ly=70;lh=72;lw=46;gx=220
        def V(x):return f'M{x},{ly} L{x+lw/2},{ly+lh} L{x+lw},{ly}'
        def U(x):
            r=lw*0.42
            return (f'M{x},{ly} L{x},{ly+lh-r} Q{x},{ly+lh} {x+r},{ly+lh} '
                    f'L{x+lw-r},{ly+lh} Q{x+lw},{ly+lh} {x+lw},{ly+lh-r} L{x+lw},{ly}')
        def Ap(x):
            by=ly+lh*0.62
            return (f'M{x},{ly+lh} L{x+lw/2},{ly} L{x+lw},{ly+lh} '
                    f'M{x+lw*0.18},{by} L{x+lw*0.82},{by}')
        extra=(f'<g fill="none" stroke="url(#gold)" stroke-width="{sw}" stroke-linejoin="miter">'
               f'<path d="{V(gx)}"/><path d="{U(gx+lw+22)}"/><path d="{Ap(gx+2*(lw+22))}"/></g>'
               f'<text x="{gx+2}" y="178" fill="{G_LT if navy else G_DK}" font-family="DejaVu Sans" '
               f'font-weight="bold" font-size="18" letter-spacing="4.5">BAO BÌ CÔNG NGHIỆP</text>')
    return f'<svg xmlns="http://www.w3.org/2000/svg" width="{W}" height="{H}" viewBox="0 0 {W} {H}"><defs>{GRAD}</defs><rect width="{W}" height="{H}" fill="{bg}"/>{box}{cr}{extra}</svg>'

# ---- V2: FRONT-VIEW closed carton (flaps + tape) + crown ----
def concept_2(navy=True):
    bg=NAVY if navy else "#fff"
    cx=150
    # box body trapezoid (front face), top closed flaps
    body=f'''<path d="M88,150 L212,150 L205,255 L95,255 Z" fill="url(#goldS)"/>
      <path d="M88,150 L150,170 L150,135 Z" fill="{G_HI}"/>
      <path d="M212,150 L150,170 L150,135 Z" fill="{G_LT}"/>
      <path d="M150,135 L150,170" stroke="{G_DD}" stroke-width="2" opacity=".5"/>'''
    flaps=f'<path d="M88,150 L150,135 L212,150" fill="none" stroke="{G_DK}" stroke-width="2" opacity=".4"/>'
    tape=f'<rect x="142" y="150" width="16" height="105" fill="{G_HI}" opacity=".5"/>'
    cr=f'<g transform="translate({cx},100)">{crown(-52,0,104,60)}</g>'
    return f'<svg xmlns="http://www.w3.org/2000/svg" width="300" height="300" viewBox="0 0 300 300"><defs>{GRAD}</defs><rect width="300" height="300" fill="{bg}"/>{body}{flaps}{tape}{cr}</svg>'

# ---- V3: emblem badge (rounded square) box+crown app icon ----
def concept_3(navy=True):
    bg=NAVY if navy else "#fff"
    panel=NAVY2
    box=f'<g transform="translate(160,168)">{iso_box(0,0,56,42)}</g>'
    cr=f'<g transform="translate(160,128)">{crown(-46,0,92,56)}</g>'
    return f'''<svg xmlns="http://www.w3.org/2000/svg" width="320" height="320" viewBox="0 0 320 320"><defs>{GRAD}</defs>
      <rect width="320" height="320" fill="{bg}"/>
      <rect x="34" y="34" width="252" height="252" rx="58" fill="{panel}" stroke="url(#gold)" stroke-width="6"/>
      {box}{cr}</svg>'''

cs={'1':concept_1,'2':concept_2,'3':concept_3}
for n,fn in cs.items():
    for m,nv in (('navy',True),('white',False)):
        svg=fn(nv)
        open(f'{OUT}/v2_{n}_{m}.svg','w').write(svg)
        cairosvg.svg2png(bytestring=svg.encode(),write_to=f'{OUT}/v2_{n}_{m}.png',scale=2)
# horizontal lockup using V1 icon
svg=concept_1(True,wordmark=True)
open(f'{OUT}/v2_lockup_navy.svg','w').write(svg)
cairosvg.svg2png(bytestring=svg.encode(),write_to=f'{OUT}/v2_lockup_navy.png',scale=2)
print("done")
