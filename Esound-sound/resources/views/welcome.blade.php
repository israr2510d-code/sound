<!DOCTYPE html>
<html lang="en"><head><meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>SOUND – Music & Video</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:wght@400;600;800&display=swap">
<style>
:root{--bg:#f3f1ee;--sf:#fff;--tx:#14213d;--mu:#5c667a;--ac:#e85d04;--ac2:#0a9396;--bd:#d9d6d0;box-sizing:border-box;padding-top:env(safe-area-inset-top,0px);padding-bottom:env(safe-area-inset-bottom,0px)}
@media(prefers-color-scheme:dark){:root:not([data-theme=light]){--bg:#0e1626;--sf:#16233b;--tx:#eef1f7;--mu:#9aa6bd;--ac:#ffb703;--ac2:#3ad0c4;--bd:#2a3a58}}
:root[data-theme=dark]{--bg:#0e1626;--sf:#16233b;--tx:#eef1f7;--mu:#9aa6bd;--ac:#ffb703;--ac2:#3ad0c4;--bd:#2a3a58}
html{scroll-padding-top:env(safe-area-inset-top,0px)}
*{box-sizing:border-box}body{margin:0;background:var(--bg);color:var(--tx);font:16px/1.5 'Bricolage Grotesque',system-ui,sans-serif}
a{color:inherit}header{display:flex;flex-wrap:wrap;gap:12px;align-items:center;justify-content:space-between;padding:14px 5vw;border-bottom:2px solid var(--tx);position:sticky;top:0;background:var(--bg);z-index:5}
.logo{font-weight:800;font-size:28px;letter-spacing:-1px;cursor:pointer}.logo b{color:var(--ac)}
nav{display:flex;flex-wrap:wrap;gap:6px}nav button,.btn{font:inherit;font-weight:600;background:none;color:var(--tx);border:2px solid var(--tx);padding:6px 14px;border-radius:99px;cursor:pointer}
nav button:hover,.btn:hover,.btn.p{background:var(--ac);color:#111;border-color:var(--ac)}.btn.p:hover{filter:brightness(1.08)}
button:focus-visible,input:focus-visible,select:focus-visible,textarea:focus-visible{outline:3px solid var(--ac2);outline-offset:2px}
main{padding:24px 5vw 60px;max-width:1200px;margin:auto}h1{font-size:clamp(34px,7vw,72px);line-height:1;letter-spacing:-2px;margin:10px 0}h2{font-size:26px;margin:34px 0 12px}
.hero{display:grid;gap:18px;grid-template-columns:1fr;border-bottom:2px solid var(--tx);padding-bottom:26px}.hero p{max-width:60ch;color:var(--mu)}
.grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(190px,1fr));gap:16px}
.card{background:var(--sf);border:2px solid var(--tx);border-radius:10px;overflow:hidden;cursor:pointer;display:flex;flex-direction:column}
.card:hover{transform:translate(-2px,-2px);box-shadow:4px 4px 0 var(--tx)}
.cov{aspect-ratio:1/1;display:flex;align-items:flex-end;padding:10px;font-weight:800;font-size:44px;color:#fff;position:relative;text-shadow:0 2px 8px #0006}
.cov small{position:absolute;top:8px;right:8px;font-size:11px;background:#000a;padding:2px 8px;border-radius:99px;font-weight:600}
.new{position:absolute;top:8px;left:8px;background:#d00;color:#fff;font-size:12px;padding:2px 8px;border-radius:4px;animation:fl 1s steps(2) infinite}
@keyframes fl{50%{opacity:.15}}@media(prefers-reduced-motion:reduce){.new{animation:none}}
.ci{padding:10px 12px}.ci b{display:block}.ci span{color:var(--mu);font-size:14px}.st{color:var(--ac)}
.bar{display:flex;flex-wrap:wrap;gap:8px;margin:14px 0}input,select,textarea{font:inherit;padding:8px 10px;border:2px solid var(--tx);border-radius:8px;background:var(--sf);color:var(--tx);max-width:100%}
.box{background:var(--sf);border:2px solid var(--tx);border-radius:10px;padding:18px;margin:12px 0}.form{display:grid;gap:10px;max-width:520px}.form label{display:grid;gap:3px;font-weight:600}
.err{color:#d00;font-weight:600}.ok{color:var(--ac2);font-weight:600}table{width:100%;border-collapse:collapse}td,th{padding:7px;border-bottom:1px solid var(--bd);text-align:left;vertical-align:top}.tw{overflow-x:auto}
.player{background:#000;border-radius:10px;overflow:hidden;color:#fff}.player video,.player canvas,.player audio{width:100%;display:block}.player canvas{aspect-ratio:16/9;background:#000}
.tabs{display:flex;flex-wrap:wrap;gap:6px;margin:12px 0}.rv{border-bottom:1px solid var(--bd);padding:8px 0}.two{display:grid;gap:20px;grid-template-columns:repeat(auto-fit,minmax(300px,1fr))}
footer{text-align:center;color:var(--mu);padding:20px}
</style></head><body>
<header><div class="logo" onclick="go('home')">SOUND<b>.</b></div><nav id="nav"></nav></header>
<main id="app"></main><footer>SOUND Group · Entertainment Portal (eProject demo)</footer>
<script>
const $=s=>document.querySelector(s);
const esc=s=>String(s??'').replace(/[&<>"']/g,c=>({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c]));
let DB,me=null,view='home',arg=null,flt={q:'',type:'',language:'',genre:'',year:'',artist:'',album:''},msg='',tab='add';
const CK=['artist','album','year','genre','language'];
function seed(){const now=Date.now(),d=86400000,m=(i,t,ti,ar,al,y,g,l,ds,ago)=>({id:i,type:t,title:ti,artist:ar,album:al,year:y,genre:g,language:l,desc:ds,src:'',added:now-ago*d});
return{users:[{id:'admin',pw:'admin123',name:'Site Admin',address:'Head Office',phone:'0000000000',email:'admin@sound.com',role:'admin'}],
cats:{artist:['Luna Park','The Echoes','Raza Ali','Neon Tide'],album:['Midnight Drive','Golden Hour','Dil Ki Baat','Wave One'],year:['2020','2022','2024','2026'],genre:['Pop','Rock','Classical','Electronic'],language:['English','Urdu','Hindi']},
info:'SOUND hosts new and old songs and videos in regional and English languages. Browse by album, artist, year, genre or language, then rate and review your favourites.',
media:[m(1,'music','Neon Skyline','Neon Tide','Wave One','2026','Electronic','English','Synth-heavy night anthem.',1),m(2,'music','Dil Ki Baat','Raza Ali','Dil Ki Baat','2024','Classical','Urdu','A soulful ghazal-style melody.',2),m(3,'music','Golden Hour','Luna Park','Golden Hour','2022','Pop','English','Sunny pop for the evening.',3),m(4,'music','Echo Road','The Echoes','Midnight Drive','2020','Rock','English','Classic road-trip rock.',40),m(5,'music','Chand Raat','Raza Ali','Dil Ki Baat','2024','Pop','Hindi','Festival night special.',50),m(6,'music','Old Radio','The Echoes','Midnight Drive','2020','Rock','English','Vintage radio vibes.',90),
m(11,'video','Neon Skyline (Live)','Neon Tide','Wave One','2026','Electronic','English','Live concert visuals.',1),m(12,'video','Dil Ki Baat (Official)','Raza Ali','Dil Ki Baat','2024','Classical','Urdu','Official video.',2),m(13,'video','Golden Hour Lyric','Luna Park','Golden Hour','2022','Pop','English','Lyric video.',4),m(14,'video','Echo Road Tour','The Echoes','Midnight Drive','2020','Rock','English','Tour documentary.',45),m(15,'video','Chand Raat Mix','Raza Ali','Dil Ki Baat','2024','Pop','Hindi','Festival mix.',60),m(16,'video','Old Radio Cover','The Echoes','Midnight Drive','2020','Rock','English','Fan cover video.',99)],
reviews:[{mid:1,uid:'admin',rating:5,text:'Great opening track!'}]}}
function load(){try{DB=JSON.parse(localStorage.getItem('sound_db'))}catch(e){}if(!DB)DB=seed()}
function save(){try{localStorage.setItem('sound_db',JSON.stringify(DB))}catch(e){msg='Storage full – large files may not persist.'}}
load();try{const s=sessionStorage.getItem('sound_me');if(s)me=DB.users.find(u=>u.id===s)||null}catch(e){}
function go(v,a){view=v;arg=a??null;msg='';stopP();render();scrollTo(0,0)}
const isA=()=>me&&me.role==='admin';
function nav(){$('#nav').innerHTML=`<button onclick="go('home')">Home</button><button onclick="go('browse','music')">Music</button><button onclick="go('browse','video')">Videos</button>`+(isA()?`<button onclick="go('admin')">Admin</button>`:'')+(me?`<button onclick="logout()">Logout (${esc(me.id)})</button>`:`<button onclick="go('login')">Login</button><button onclick="go('register')">Register</button>`)}
function logout(){me=null;try{sessionStorage.removeItem('sound_me')}catch(e){}go('home')}
const hue=s=>{let h=0;for(const c of String(s))h=(h*31+c.charCodeAt(0))%360;return h};
const avg=id=>{const r=DB.reviews.filter(x=>x.mid===id&&x.rating);return r.length?(r.reduce((a,b)=>a+b.rating,0)/r.length):0};
const stars=n=>'★'.repeat(Math.round(n))+'☆'.repeat(5-Math.round(n));
const isNew=m=>Date.now()-m.added<7*86400000;
function card(m){const h=hue(m.album+m.title),a=avg(m.id);return`<div class="card" onclick="go('item',${m.id})" tabindex="0" onkeydown="if(event.key==='Enter')go('item',${m.id})"><div class="cov" style="background:linear-gradient(135deg,hsl(${h},70%,45%),hsl(${(h+60)%360},70%,30%))">${m.type==='video'?'▶':'♪'}<small>${m.type==='video'?'Video':'Music'}</small>${isNew(m)?'<span class="new">NEW</span>':''}</div><div class="ci"><b>${esc(m.title)}</b><span>${esc(m.artist)} · ${esc(m.year)}</span><br><span class="st">${a?stars(a)+' '+a.toFixed(1):'<span style="color:var(--mu)">No ratings</span>'}</span></div></div>`}
const latest=t=>DB.media.filter(m=>m.type===t).sort((a,b)=>b.added-a.added).slice(0,5);
function home(){return`<section class="hero"><h1>Hear it.<br>Watch it. Rate it.</h1><p>${esc(DB.info)}</p></section><h2>Latest music</h2><div class="grid">${latest('music').map(card).join('')}</div><h2>Latest videos</h2><div class="grid">${latest('video').map(card).join('')}</div>`}
function sel(k,label,val,list){return`<select onchange="flt.${k}=this.value;render()" aria-label="${label}"><option value="">All ${label}</option>${list.map(x=>`<option ${x===val?'selected':''}>${esc(x)}</option>`).join('')}</select>`}
function browse(){if(arg!==null){flt={q:'',type:arg,language:'',genre:'',year:'',artist:'',album:''};arg=null}
const q=flt.q.toLowerCase();const r=DB.media.filter(m=>(!flt.type||m.type===flt.type)&&CK.every(k=>!flt[k]||m[k]===flt[k])&&(!q||[m.title,m.artist,m.album,m.year,m.genre,m.language].join(' ').toLowerCase().includes(q)));
return`<h2>Browse & search</h2><div class="bar"><input id="q" placeholder="Search name, artist, year, album…" value="${esc(flt.q)}" oninput="flt.q=this.value;render(1)">${sel('type','types',flt.type,['music','video'])}${CK.map(k=>sel(k,k,flt[k],DB.cats[k])).join('')}</div><div class="grid">${r.map(card).join('')||'<p>No results. Try clearing a filter.</p>'}</div>`}
/* players */
let ac=null,raf=0,osc=[];
function stopP(){cancelAnimationFrame(raf);osc.forEach(o=>{try{o.stop()}catch(e){}});osc=[];if(ac){try{ac.close()}catch(e){}ac=null}document.querySelectorAll('video,audio').forEach(v=>v.pause())}
function demo(id){const m=DB.media.find(x=>x.id===id),c=$('#cv'),x=c.getContext('2d'),h=hue(m.album+m.title);stopP();
try{ac=new (window.AudioContext||window.webkitAudioContext)();const sc=[0,3,7,12,7,3],base=m.type==='video'?196:262;let i=0;const g=ac.createGain();g.gain.value=.08;g.connect(ac.destination);
const tick=()=>{if(!ac)return;const o=ac.createOscillator();o.type=m.type==='video'?'sawtooth':'triangle';o.frequency.value=base*Math.pow(2,sc[i++%6]/12);o.connect(g);o.start();o.stop(ac.currentTime+.28);setTimeout(tick,300)};tick()}catch(e){}
const t0=performance.now();(function f(){const t=(performance.now()-t0)/1000,w=c.width,H=c.height;x.fillStyle=`hsl(${h},60%,12%)`;x.fillRect(0,0,w,H);
for(let i=0;i<48;i++){const a=Math.abs(Math.sin(t*2+i*.4))*(H*.45);x.fillStyle=`hsl(${(h+i*4+t*30)%360},80%,60%)`;x.fillRect(i*(w/48)+2,H/2-a,w/48-4,a*2)}
if(m.type==='video'){x.beginPath();x.arc(w/2+Math.cos(t)*w*.25,H/2+Math.sin(t*1.3)*H*.25,30,0,7);x.fillStyle='#fff9';x.fill()}
x.fillStyle='#fff';x.font='bold 26px sans-serif';x.fillText(m.title,20,H-24);raf=requestAnimationFrame(f)})()}
function player(m){if(m.src)return m.type==='video'?`<div class="player"><video controls playsinline src="${esc(m.src)}"></video></div>`:`<div class="player"><audio controls src="${esc(m.src)}"></audio></div>`;
return`<div class="player"><canvas id="cv" width="800" height="450"></canvas><div style="padding:10px;display:flex;gap:8px;align-items:center"><button class="btn p" onclick="demo(${m.id})">▶ Play demo ${m.type}</button><button class="btn" style="color:#fff;border-color:#fff" onclick="stopP()">■ Stop</button><small>Demo playback – upload a real file in Admin to play your own.</small></div></div>`}
function item(){const m=DB.media.find(x=>x.id===arg);if(!m)return'<p>Not found.</p>';const rs=DB.reviews.filter(r=>r.mid===m.id),mine=me&&rs.find(r=>r.uid===me.id),a=avg(m.id);
return`<p><button class="btn" onclick="history.length&&go('browse')">← Back</button></p><div class="two"><div>${player(m)}</div><div><h1 style="font-size:40px">${esc(m.title)}</h1><p>${esc(m.desc)}</p><table><tr><th>Artist</th><td>${esc(m.artist)}</td></tr><tr><th>Album</th><td>${esc(m.album)}</td></tr><tr><th>Year</th><td>${esc(m.year)}</td></tr><tr><th>Genre</th><td>${esc(m.genre)}</td></tr><tr><th>Language</th><td>${esc(m.language)}</td></tr></table><p class="st" style="font-size:22px">${a?stars(a)+' '+a.toFixed(1):'Not rated yet'}</p></div></div>
<h2>Reviews & rating</h2>${me?`<div class="box form"><label>Your rating<select id="rt">${[5,4,3,2,1].map(n=>`<option value="${n}" ${mine&&mine.rating===n?'selected':''}>${n} – ${stars(n)}</option>`).join('')}</select></label><label>Your review<textarea id="rtx" rows="3">${esc(mine?mine.text:'')}</textarea></label><button class="btn p" onclick="saveRev(${m.id})">${mine?'Update review':'Post review'}</button><span class="err">${esc(msg)}</span></div>`:`<p><a href="#" onclick="go('login');return false">Log in</a> to rate and review.</p>`}
${rs.map(r=>`<div class="rv"><b>${esc(r.uid)}</b> <span class="st">${stars(r.rating)}</span><br>${esc(r.text)}</div>`).join('')||'<p>No reviews yet.</p>'}`}
function saveRev(id){const rating=+$('#rt').value,text=$('#rtx').value.trim();if(text.length<3){msg='Please write a review of at least 3 characters.';return render()}
let r=DB.reviews.find(x=>x.mid===id&&x.uid===me.id);if(r){r.rating=rating;r.text=text}else DB.reviews.push({mid:id,uid:me.id,rating,text});save();msg='';render()}
/* auth */
function login(){return`<h2>Login</h2><div class="box form"><label>User ID<input id="lu" autocomplete="username"></label><label>Password<input id="lp" type="password" autocomplete="current-password"></label><button class="btn p" onclick="doLogin()">Log in</button><span class="err">${esc(msg)}</span><small>Admin demo: admin / admin123</small></div>`}
function doLogin(){const u=DB.users.find(x=>x.id===$('#lu').value.trim()&&x.pw===$('#lp').value);if(!u){msg='Wrong user ID or password.';return render()}me=u;try{sessionStorage.setItem('sound_me',u.id)}catch(e){}go('home')}
function register(){return`<h2>Create account</h2><div class="box form">${[['ru','User ID (unique)'],['rp','Password (min 6)','password'],['rn','Full name'],['ra','Address'],['rph','Phone (10–15 digits)'],['re','Email']].map(f=>`<label>${f[1]}<input id="${f[0]}" type="${f[2]||'text'}"></label>`).join('')}<button class="btn p" onclick="doReg()">Register</button><span class="err">${esc(msg)}</span></div>`}
function doReg(){const v=i=>$('#'+i).value.trim(),id=v('ru'),pw=$('#rp').value,n=v('rn'),a=v('ra'),p=v('rph'),e=v('re');let er='';
if(!/^[A-Za-z0-9_]{4,20}$/.test(id))er='User ID must be 4–20 letters, numbers or underscore.';else if(DB.users.some(u=>u.id.toLowerCase()===id.toLowerCase()))er='This User ID is already taken.';else if(pw.length<6)er='Password needs at least 6 characters.';else if(!/^[A-Za-z .'-]{2,}$/.test(n))er='Enter a valid name (letters only).';else if(a.length<5)er='Address is required (min 5 characters).';else if(!/^\+?\d{10,15}$/.test(p))er='Phone must be 10–15 digits.';else if(!/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(e))er='Enter a valid email.';
if(er){msg=er;return render()}DB.users.push({id,pw,name:n,address:a,phone:p,email:e,role:'user'});save();me=DB.users.at(-1);try{sessionStorage.setItem('sound_me',id)}catch(x){}go('home')}
/* admin */
const pendFile={src:''};
function admin(){if(!isA())return'<p class="err">Admins only.</p>';const T=[['add','Add media'],['cats','Categories'],['media','Manage media'],['users','Users'],['info','Site info']];
let b='';if(tab==='add')b=`<div class="box form"><label>Type<select id="at"><option>music</option><option>video</option></select></label><label>Title<input id="ati"></label>${CK.map(k=>`<label>${k}<select id="a_${k}">${DB.cats[k].map(x=>`<option>${esc(x)}</option>`).join('')}</select></label>`).join('')}<label>Description<textarea id="ad" rows="2"></textarea></label><label>Media file (audio/video)<input id="af" type="file" accept="audio/*,video/*" onchange="readF(this)"></label><label>…or media URL (optional)<input id="au" placeholder="https://…"></label><button class="btn p" onclick="addM()">Add</button><span class="err">${esc(msg)}</span></div>`;
if(tab==='cats')b=`<div class="two">${CK.map(k=>`<div class="box"><b>${k}</b><div>${DB.cats[k].map(x=>`<span>${esc(x)} <a href="#" onclick="delC('${k}','${esc(x).replace(/'/g,'')}');return false">✕</a></span>`).join(', ')}</div><div class="bar"><input id="c_${k}" placeholder="New ${k}"><button class="btn" onclick="addC('${k}')">Add</button></div></div>`).join('')}</div>`;
if(tab==='media')b=`<div class="tw"><table><tr><th>Title</th><th>Type</th><th></th></tr>${DB.media.map(m=>`<tr><td>${esc(m.title)}</td><td>${m.type}</td><td><button class="btn" onclick="delM(${m.id})">Delete</button></td></tr>`).join('')}</table></div>`;
if(tab==='users')b=`<div class="tw"><table><tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th></th></tr>${DB.users.map(u=>`<tr><td>${esc(u.id)}</td><td>${esc(u.name)}</td><td>${esc(u.email)}</td><td>${esc(u.phone)}</td><td>${u.id==='admin'?'':`<button class="btn" onclick="delU('${esc(u.id)}')">Delete</button>`}</td></tr>`).join('')}</table></div><p><small>Users register themselves; admin can remove logins here.</small></p>`;
if(tab==='info')b=`<div class="box form"><label>Home page text<textarea id="inf" rows="5">${esc(DB.info)}</textarea></label><button class="btn p" onclick="DB.info=$('#inf').value;save();msg='Saved.';render()">Save changes</button><span class="ok">${esc(msg)}</span></div>`;
return`<h2>Admin panel</h2><div class="tabs">${T.map(t=>`<button class="btn ${tab===t[0]?'p':''}" onclick="tab='${t[0]}';msg='';render()">${t[1]}</button>`).join('')}</div>${b}`}
function readF(el){const f=el.files[0];if(!f)return;if(f.size<2.5e6){const r=new FileReader();r.onload=()=>pendFile.src=r.result;r.readAsDataURL(f)}else{pendFile.src=URL.createObjectURL(f);alert('Large file: it will play now but only until you close this tab.')}}
function addM(){const t=$('#ati').value.trim();if(t.length<2){msg='Title is required.';return render()}const o={id:Date.now(),type:$('#at').value,title:t,desc:$('#ad').value.trim(),src:pendFile.src||$('#au').value.trim(),added:Date.now()};CK.forEach(k=>o[k]=$('#a_'+k).value);DB.media.push(o);pendFile.src='';save();msg='Added – it now shows as NEW on the home page.';render()}
function addC(k){const v=$('#c_'+k).value.trim();if(v&&!DB.cats[k].includes(v)){DB.cats[k].push(v);save()}render()}
function delC(k,v){DB.cats[k]=DB.cats[k].filter(x=>x!==v);save();render()}
function delM(id){if(confirm('Delete this item?')){DB.media=DB.media.filter(m=>m.id!==id);DB.reviews=DB.reviews.filter(r=>r.mid!==id);save();render()}}
function delU(id){if(confirm('Delete user '+id+'?')){DB.users=DB.users.filter(u=>u.id!==id);save();render()}}
function render(keep){nav();const f={home,browse,item,login,register,admin}[view];$('#app').innerHTML=f();if(keep){const q=$('#q');if(q){q.focus();q.setSelectionRange(q.value.length,q.value.length)}}}
render();
</script></body></html>