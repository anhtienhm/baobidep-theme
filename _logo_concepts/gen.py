#!/usr/bin/env python3
# Generate logo concepts for VUA Bao Bi Cong Nghiep
import cairosvg, os

NAVY  = "#0D255C"
NAVY2 = "#1A3C86"
G_HI  = "#FFE08A"
G_LT  = "#FFD24D"
G_MD  = "#F5B30B"
G_DK  = "#C98A06"

OUT = os.path.dirname(os.path.abspath(__file__))

GRAD_GOLD = f'''
  <linearGradient id="gold" x1="0" y1="0" x2="0" y2="1">
    <stop offset="0" stop-color="{G_HI}"/><stop offset=".5" stop-color="{G_LT}"/>
    <stop offset="1" stop-color="{G_MD}"/></linearGradient>
  <linearGradient id="goldD" x1="0" y1="0" x2="1" y2="1">
    <stop offset="0" stop-color="{G_LT}"/><stop offset="1" stop-color="{G_DK}"/></linearGradient>'''

# ---- letter paths (stroke based, condensed bold) ----
def letter_V(x,y,w,h):
    return f'M{x},{y} L{x+w/2},{y+h} L{x+w},{y}'
def letter_U(x,y,w,h):
    r=w*0.42
    return (f'M{x},{y} L{x},{y+h-r} Q{x},{y+h} {x+r},{y+h} '
            f'L{x+w-r},{y+h} Q{x+w},{y+h} {x+w},{y+h-r} L{x+w},{y}')
def letter_A(x,y,w,h):
    bar_y=y+h*0.62
    return (f'M{x},{y+h} L{x+w/2},{y} L{x+w},{y+h} '
            f'M{x+w*0.18},{bar_y} L{x+w*0.82},{bar_y}')

def crown(x,y,w,h,fill="url(#gold)"):
    seg=w/3
    p=(f'M{x},{y+h} L{x},{y+h*0.62} '
       f'L{x+0.5*seg},{y+h*0.06} L{x+1.0*seg},{y+h*0.5} '
       f'L{x+1.5*seg},{y} L{x+2.0*seg},{y+h*0.5} '
       f'L{x+2.5*seg},{y+h*0.06} L{x+3.0*seg},{y+h*0.62} '
       f'L{x+w},{y+h} Z')
    jew=''
    for px in (x+0.5*seg, x+1.5*seg, x+2.5*seg):
        py = (y+h*0.06) if abs(px-(x+1.5*seg))>1 else y
        jew+=f'<circle cx="{px}" cy="{py}" r="{h*0.085}" fill="{fill}"/>'
    return f'<path d="{p}" fill="{fill}"/>{jew}'

def cube(cx,ty,s,sh):
    A=(cx,ty); B=(cx+s,ty+s*0.5); C=(cx,ty+s); D=(cx-s,ty+s*0.5)
    bottomC=(cx,ty+s+sh); bL=(cx-s,ty+s*0.5+sh); bR=(cx+s,ty+s*0.5+sh)
    top=f'<path d="M{A[0]},{A[1]} L{B[0]},{B[1]} L{C[0]},{C[1]} L{D[0]},{D[1]} Z" fill="{G_HI}"/>'
    left=f'<path d="M{D[0]},{D[1]} L{C[0]},{C[1]} L{bottomC[0]},{bottomC[1]} L{bL[0]},{bL[1]} Z" fill="{G_DK}"/>'
    right=f'<path d="M{B[0]},{B[1]} L{C[0]},{C[1]} L{bottomC[0]},{bottomC[1]} L{bR[0]},{bR[1]} Z" fill="{G_MD}"/>'
    seam=f'<path d="M{cx},{ty+s*0.18} L{cx},{ty+s*0.18-0} " />'
    return top+right+left

# ================= CONCEPT A: Crown-Carton horizontal lockup =================
def concept_A(on_navy=True):
    bg = NAVY if on_navy else "#ffffff"
    sub = G_LT if on_navy else G_DK
    word = "url(#gold)"
    sw=15
    # icon: box + crown
    icon = f'''<g transform="translate(40,55)">
      {cube(60,70,52,40)}
      <g>{crown(20,18,80,52)}</g>
    </g>'''
    # wordmark VUA
    lh=70; ly=78; lw=46
    gx=200
    word_paths=(
      f'<path d="{letter_V(gx,ly,lw,lh)}" />'
      f'<path d="{letter_U(gx+lw+22,ly,lw,lh)}" />'
      f'<path d="{letter_A(gx+2*(lw+22),ly,lw,lh)}" />')
    wm=f'''<g fill="none" stroke="{word}" stroke-width="{sw}"
        stroke-linecap="butt" stroke-linejoin="miter">{word_paths}</g>'''
    subtxt=f'''<text x="{gx+2}" y="185" fill="{sub}"
        font-family="DejaVu Sans" font-weight="bold" font-size="19"
        letter-spacing="5">BAO BÌ CÔNG NGHIỆP</text>'''
    return f'''<svg xmlns="http://www.w3.org/2000/svg" width="600" height="220" viewBox="0 0 600 220">
      <defs>{GRAD_GOLD}</defs>
      <rect width="600" height="220" fill="{bg}"/>
      {icon}{wm}{subtxt}</svg>'''

# ================= CONCEPT B: V-Box app monogram =================
def concept_B(on_navy=True):
    bg = NAVY if on_navy else "#ffffff"
    # rounded square shield navy/gold
    panel = NAVY2 if on_navy else NAVY2
    # The V is the open carton seen front; crown peaks crown the V
    icon=f'''
    <rect x="36" y="36" width="248" height="248" rx="54"
        fill="{panel}" stroke="url(#gold)" stroke-width="6"/>
    <g>{crown(105,70,110,60)}</g>
    <g fill="none" stroke="url(#gold)" stroke-width="30"
       stroke-linejoin="miter" stroke-linecap="butt">
       <path d="M95,150 L160,250 L225,150"/>
    </g>
    <path d="M95,150 L160,250 L225,150 L208,150 L160,222 L112,150 Z"
       fill="{G_HI}" opacity="0.0"/>
    '''
    return f'''<svg xmlns="http://www.w3.org/2000/svg" width="320" height="320" viewBox="0 0 320 320">
      <defs>{GRAD_GOLD}</defs>
      <rect width="320" height="320" fill="{bg}"/>
      {icon}</svg>'''

# ================= CONCEPT C: Modern flat seal =================
def concept_C(on_navy=True):
    bg = NAVY if on_navy else "#ffffff"
    ring = "url(#gold)"
    cx=160; cy=160
    seal=f'''
    <circle cx="{cx}" cy="{cy}" r="120" fill="{NAVY2}" stroke="url(#gold)" stroke-width="5"/>
    <circle cx="{cx}" cy="{cy}" r="104" fill="none" stroke="{G_LT}" stroke-width="1.5" opacity=".55"/>
    <g>{crown(118,72,84,46)}</g>
    <g fill="none" stroke="url(#gold)" stroke-width="13"
       stroke-linecap="butt" stroke-linejoin="miter">
      <path d="{letter_V(108,135,40,58)}"/>
      <path d="{letter_U(150,135,38,58)}"/>
      <path d="{letter_A(192,135,40,58)}"/>
    </g>
    <text x="{cx}" y="232" text-anchor="middle" fill="{G_LT}"
      font-family="DejaVu Sans" font-weight="bold" font-size="15"
      letter-spacing="3">BAO BÌ CÔNG NGHIỆP</text>
    '''
    return f'''<svg xmlns="http://www.w3.org/2000/svg" width="320" height="320" viewBox="0 0 320 320">
      <defs>{GRAD_GOLD}</defs>
      <rect width="320" height="320" fill="{bg}"/>
      {seal}</svg>'''

concepts={'A':concept_A,'B':concept_B,'C':concept_C}
for name,fn in concepts.items():
    for mode,navy in (('navy',True),('white',False)):
        svg=fn(navy)
        open(f'{OUT}/concept_{name}_{mode}.svg','w').write(svg)
        cairosvg.svg2png(bytestring=svg.encode(),write_to=f'{OUT}/concept_{name}_{mode}.png',scale=2)
print("done")
