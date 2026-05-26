const header=document.getElementById('header');
addEventListener('scroll',()=>header.classList.toggle('shrink',scrollY>30));
const burger=document.getElementById('burger'),menu=document.getElementById('menu');
const closeMenu=()=>{menu.classList.remove('open');document.body.classList.remove('menu-open');};
burger.addEventListener('click',e=>{e.stopPropagation();const o=menu.classList.toggle('open');document.body.classList.toggle('menu-open',o);});
menu.querySelectorAll('a').forEach(a=>a.addEventListener('click',closeMenu));
document.addEventListener('click',e=>{if(menu.classList.contains('open')&&!menu.contains(e.target)&&!burger.contains(e.target))closeMenu();});
const io=new IntersectionObserver(es=>es.forEach(e=>{if(e.isIntersecting){e.target.classList.add('in');io.unobserve(e.target)}}),{threshold:.12});
document.querySelectorAll('.rv').forEach(el=>io.observe(el));
const cio=new IntersectionObserver(es=>es.forEach(e=>{if(!e.isIntersecting)return;const el=e.target,end=+el.dataset.c,sf=el.dataset.s||'';let n=0,st=Math.max(1,Math.round(end/45));const t=setInterval(()=>{n+=st;if(n>=end){n=end;clearInterval(t)}el.textContent=n+sf},22);cio.unobserve(el)}),{threshold:.6});
document.querySelectorAll('[data-c]').forEach(el=>cio.observe(el));
const f=document.getElementById('leadForm'),re=/^(0|\+84)\d{9,10}$/;
const bad=(id,b)=>document.getElementById(id).closest('.fg').classList.toggle('bad',b);
f.addEventListener('submit',e=>{e.preventDefault();
  const n=document.getElementById('name'),p=document.getElementById('phone'),pr=document.getElementById('prod');
  const bn=!n.value.trim(),bp=!re.test(p.value.replace(/[\s.]/g,'')),bpr=!pr.value;
  bad('name',bn);bad('phone',bp);bad('prod',bpr);
  if(bn||bp||bpr)return;
  const fd=new URLSearchParams();fd.append('action','vua_lead');fd.append('nonce',(window.vuaAjax&&vuaAjax.nonce)||'');fd.append('name',n.value);fd.append('phone',p.value);fd.append('email',(document.getElementById('email')||{}).value||'');fd.append('prod',pr.value);
  fetch((window.vuaAjax&&vuaAjax.url)||'',{method:'POST',headers:{'Content-Type':'application/x-www-form-urlencoded'},body:fd}).then(r=>r.json()).catch(()=>({})).then(()=>{f.style.display='none';document.getElementById('qok').style.display='block';});
});
const fab=document.getElementById('fab'),fabBtn=document.getElementById('fabBtn');
if(fab&&fabBtn){
  fabBtn.addEventListener('click',e=>{e.stopPropagation();const o=fab.classList.toggle('is-open');fabBtn.setAttribute('aria-expanded',o);});
  document.addEventListener('click',e=>{if(fab.classList.contains('is-open')&&!fab.contains(e.target)){fab.classList.remove('is-open');fabBtn.setAttribute('aria-expanded','false');}});
}

// ===== Cart =====
const cartAjax=(action,data={})=>{
  const fd=new URLSearchParams();
  fd.append('action',action);
  fd.append('nonce',(window.vuaAjax&&vuaAjax.cartNonce)||'');
  for(const k in data)fd.append(k,data[k]);
  return fetch((window.vuaAjax&&vuaAjax.url)||'',{method:'POST',headers:{'Content-Type':'application/x-www-form-urlencoded'},body:fd}).then(r=>r.json());
};
const updateCartBadge=n=>{
  const c=document.querySelector('.hcart');
  if(!c)return;
  let badge=c.querySelector('.cart-count');
  if(n>0){
    if(!badge){badge=document.createElement('span');badge.className='cart-count';c.appendChild(badge);}
    badge.textContent=n;
  }else if(badge){badge.remove();}
};
const showToast=msg=>{
  let t=document.querySelector('.cart-toast');
  if(!t){
    t=document.createElement('div');
    t.className='cart-toast';
    t.innerHTML='<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m9 11 3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg><span></span>';
    document.body.appendChild(t);
  }
  t.querySelector('span').textContent=msg;
  t.classList.add('show');
  clearTimeout(t._t);
  t._t=setTimeout(()=>t.classList.remove('show'),2400);
};

// Qty +/- controls (works on all .qty-wrap)
document.addEventListener('click',e=>{
  const dec=e.target.closest('.qty-dec'),inc=e.target.closest('.qty-inc');
  if(!dec&&!inc)return;
  const wrap=(dec||inc).closest('.qty-wrap, .cart-qty, .sp-buy');
  if(!wrap)return;
  const input=wrap.querySelector('input.qty-input, #spQty');
  if(!input)return;
  let v=parseInt(input.value,10)||1;
  v=dec?Math.max(1,v-1):Math.min(999,v+1);
  input.value=v;
  input.dispatchEvent(new Event('change',{bubbles:true}));
});

// Add to cart (single product page)
document.querySelectorAll('.add-to-cart').forEach(btn=>{
  btn.addEventListener('click',()=>{
    const id=btn.dataset.id,qtyEl=document.getElementById('spQty');
    const qty=qtyEl?parseInt(qtyEl.value,10)||1:1;
    btn.classList.add('loading');
    cartAjax('vua_cart_add',{id,qty}).then(r=>{
      btn.classList.remove('loading');
      if(r&&r.success){
        updateCartBadge(r.data.count);
        btn.classList.add('added');
        showToast('Đã thêm vào giỏ hàng');
        setTimeout(()=>btn.classList.remove('added'),1500);
      }else{
        showToast((r&&r.data&&r.data.msg)||'Lỗi, vui lòng thử lại');
      }
    }).catch(()=>{btn.classList.remove('loading');showToast('Lỗi mạng');});
  });
});

// Cart page: qty change + remove
document.querySelectorAll('.cart-row').forEach(row=>{
  const id=row.dataset.id;
  const input=row.querySelector('.qty-input');
  const lineTotalEl=row.querySelector('.cart-line-total');
  const updateRow=()=>{
    const qty=parseInt(input.value,10)||1;
    cartAjax('vua_cart_update',{id,qty}).then(r=>{
      if(r&&r.success){
        updateCartBadge(r.data.count);
        document.getElementById('cartSumCount')&&(document.getElementById('cartSumCount').textContent=r.data.count);
        document.getElementById('cartSumTotal')&&(document.getElementById('cartSumTotal').textContent=r.data.total_fmt);
        if(lineTotalEl){
          const price=parseFloat(row.querySelector('.cart-price')?.dataset.price||'0');
          // server tra ve total, lay line moi tu DOM phai reload — de don gian reload
          location.reload();
        }
      }
    });
  };
  let debounce;
  input&&input.addEventListener('change',()=>{clearTimeout(debounce);debounce=setTimeout(updateRow,250);});
  const rm=row.querySelector('.cart-remove');
  rm&&rm.addEventListener('click',()=>{
    if(!confirm('Xoá sản phẩm khỏi giỏ?'))return;
    cartAjax('vua_cart_remove',{id}).then(()=>location.reload());
  });
});

// Checkout form
const cf=document.getElementById('checkoutForm');
if(cf){
  cf.addEventListener('submit',e=>{
    e.preventDefault();
    const msg=document.getElementById('checkoutMsg');
    msg.classList.remove('show');
    const fd={
      name:cf.name.value.trim(),
      phone:cf.phone.value.trim(),
      email:cf.email.value.trim(),
      address:cf.address.value.trim(),
      notes:cf.notes.value.trim(),
    };
    if(!fd.name||!fd.phone||!fd.address){
      msg.textContent='Vui lòng nhập Họ tên, SĐT và Địa chỉ.';msg.classList.add('show');return;
    }
    const btn=cf.querySelector('.checkout-submit');
    btn.classList.add('loading');btn.textContent='Đang xử lý…';
    cartAjax('vua_checkout',fd).then(r=>{
      if(r&&r.success){location.href=r.data.redirect;}
      else{msg.textContent=(r&&r.data&&r.data.msg)||'Lỗi, vui lòng thử lại';msg.classList.add('show');btn.classList.remove('loading');btn.textContent='Đặt hàng ngay';}
    }).catch(()=>{msg.textContent='Lỗi mạng';msg.classList.add('show');btn.classList.remove('loading');btn.textContent='Đặt hàng ngay';});
  });
}
