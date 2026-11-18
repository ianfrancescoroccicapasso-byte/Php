<?php
$mytitle = "Días de la semana";

$dias = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];

// Datos para la temática china (mismo orden que $dias)
$num    = ["一", "二", "三", "四", "五", "六", "日"];
$pinyin = ["xīngqī yī", "xīngqī èr", "xīngqī sān", "xīngqī sì", "xīngqī wǔ", "xīngqī liù", "xīngqī rì"];
$nota   = [
    "一 (yī) significa «uno»: el primer día de la semana.",
    "二 (èr) significa «dos»: el segundo día.",
    "三 (sān) significa «tres»: el tercer día.",
    "四 (sì) significa «cuatro»: el cuarto día.",
    "五 (wǔ) significa «cinco»: el quinto día.",
    "六 (liù) significa «seis»: el sexto día.",
    "日 (rì) significa «sol»: el domingo es el día del sol (también se dice 星期天).",
];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $mytitle; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Ma+Shan+Zheng&family=Noto+Serif+SC:wght@500;700&display=swap" rel="stylesheet">
    <style>
        :root{--rojo:#c1121f;--oro:#d4af37;--oroclaro:#ffe08a;--tinta:#1a0508;--crema:#fff1d0}
        *{box-sizing:border-box}
        body{margin:0;min-height:100vh;padding:26px 12px 34vh;display:flex;flex-direction:column;align-items:center;gap:20px;color:var(--crema);
            font-family:'Noto Serif SC','Songti SC',Georgia,serif;overflow-x:hidden;
            background:
              repeating-linear-gradient(45deg,rgba(212,175,55,.07) 0 1px,transparent 1px 22px),
              repeating-linear-gradient(-45deg,rgba(212,175,55,.07) 0 1px,transparent 1px 22px),
              radial-gradient(circle at 50% 20%,#8d0f1a,#3a050b 75%)}
        body>*{position:relative;z-index:2}

        /* Fondo: sol, montañas de tinta y pétalos */
        .sol{position:fixed;top:5vh;right:7vw;width:min(120px,22vw);aspect-ratio:1;border-radius:50%;z-index:0;
            background:radial-gradient(circle at 40% 35%,#ff5a4a,#c1121f 70%);box-shadow:0 0 60px 20px rgba(255,90,60,.35)}
        .montanas{position:fixed;left:0;bottom:0;width:100%;height:32vh;z-index:1;pointer-events:none}
        .petalos{position:fixed;inset:0;z-index:1;pointer-events:none;overflow:hidden}
        .petalo{position:absolute;top:-6vh;width:10px;height:14px;border-radius:100% 0 100% 0;background:#ffb7c5;opacity:.8;animation:caer linear infinite}
        @keyframes caer{0%{transform:translate(0,0) rotate(0)}50%{transform:translate(40px,55vh) rotate(180deg)}100%{transform:translate(-20px,112vh) rotate(360deg)}}

        /* Cabecera */
        h1{margin:0;text-align:center;font-family:'Ma Shan Zheng','KaiTi','STKaiti',serif;font-weight:400;font-size:clamp(2.2rem,8vw,4rem);
            color:var(--oroclaro);text-shadow:0 0 16px rgba(255,200,80,.6),3px 3px 0 #000;letter-spacing:.06em}
        .sub{text-align:center;font-size:.95rem;letter-spacing:.3em;color:var(--oro)}
        .sello{position:absolute;top:-2px;right:calc(50% - min(210px,40vw));width:44px;height:44px;background:var(--rojo);color:#fff;display:flex;align-items:center;justify-content:center;
            font-family:'Ma Shan Zheng',serif;font-size:1.7rem;border-radius:4px;transform:rotate(8deg);box-shadow:0 0 0 2px #7a0b13 inset}

        /* Panel */
        .hud{display:flex;flex-wrap:wrap;gap:10px 18px;justify-content:center;align-items:center;padding:10px 16px;background:rgba(26,5,8,.85);
            border:2px solid var(--oro);box-shadow:0 0 0 4px #3a050b,0 0 0 6px rgba(212,175,55,.5);font-size:.95rem}
        .hud b{color:var(--oroclaro)}
        button{font:inherit;font-weight:700;color:var(--tinta);background:linear-gradient(#f9d976,#b8860b);border:0;padding:8px 16px;cursor:pointer;border-radius:3px;
            box-shadow:0 3px 0 #5a430a;transition:.12s}
        button:hover{filter:brightness(1.15);transform:translateY(-1px)}
        button:active{transform:translateY(3px);box-shadow:0 0 0 #5a430a}
        button.on{background:linear-gradient(#ff7a6b,#c1121f);color:#fff}

        /* Faroles (cada <li>) */
        ul{list-style:none;margin:0;padding:6px 0 0;width:min(900px,100%);display:flex;flex-wrap:wrap;justify-content:center;gap:6px 24px;position:relative}
        ul::before{content:"";position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,transparent,var(--oro),transparent)}
        .farol{position:relative;display:flex;flex-direction:column;align-items:center;padding-top:38px;cursor:pointer;transform-origin:50% 0;outline:none;
            animation:columpio 3.4s ease-in-out infinite alternate;animation-delay:calc(var(--d) * -.6s);-webkit-tap-highlight-color:transparent}
        .farol::before{content:"";position:absolute;top:0;left:50%;width:2px;height:38px;background:var(--oro)}
        @keyframes columpio{from{transform:rotate(-4deg)}to{transform:rotate(4deg)}}
        .cuerpo{position:relative;width:clamp(74px,16vw,96px);height:clamp(92px,20vw,118px);border-radius:50%/46%;display:flex;flex-direction:column;align-items:center;justify-content:center;
            color:var(--oroclaro);font-family:'Ma Shan Zheng','KaiTi',serif;
            background:repeating-linear-gradient(90deg,transparent 0 13px,rgba(0,0,0,.14) 13px 14px),radial-gradient(ellipse at 35% 28%,#ff6b57,#d00000 52%,#6a040f);
            box-shadow:0 0 18px rgba(255,60,40,.45),inset 0 -10px 18px rgba(0,0,0,.35);transition:box-shadow .3s,filter .3s,transform .15s}
        .cuerpo::before,.cuerpo::after{content:"";position:absolute;left:50%;width:46%;height:10px;transform:translateX(-50%);background:linear-gradient(#f9d976,#b8860b);border-radius:2px}
        .cuerpo::before{top:-6px}.cuerpo::after{bottom:-6px}
        .farol:hover .cuerpo,.farol:focus-visible .cuerpo{transform:scale(1.08);filter:brightness(1.2)}
        .sx{font-size:1rem;opacity:.9}
        .num{font-size:clamp(2.1rem,6vw,2.9rem);line-height:1;text-shadow:0 0 8px rgba(255,220,120,.6)}
        .borla{position:relative;width:2px;height:20px;margin-top:6px;background:var(--oro)}
        .borla::after{content:"";position:absolute;bottom:-14px;left:-6px;width:14px;height:16px;border-radius:0 0 5px 5px;
            background:repeating-linear-gradient(90deg,var(--oro) 0 2px,#a8281d 2px 4px)}
        .es{margin-top:22px;padding:2px 12px;font-size:.9rem;font-weight:700;background:rgba(26,5,8,.8);border:1px solid var(--oro);border-radius:3px}
        .farol.encendida .cuerpo{filter:brightness(1.4);box-shadow:0 0 44px 12px rgba(255,200,80,.75),inset 0 0 30px rgba(255,225,130,.65)}
        .farol.encendida .es{background:var(--oro);color:var(--tinta)}
        .farol.error{animation:error .4s}
        @keyframes error{25%{transform:translateX(-8px)}50%{transform:translateX(8px)}75%{transform:translateX(-5px)}}
        body.desafio .es{visibility:hidden}
        body.desafio .farol.encendida .es{visibility:visible}

        /* Detalle */
        .detalle{width:min(660px,100%);display:grid;grid-template-columns:auto 1fr;gap:6px 22px;align-items:center;padding:16px 24px;
            background:rgba(26,5,8,.9);border:2px solid var(--oro);box-shadow:0 0 0 4px #3a050b,0 0 0 6px rgba(212,175,55,.5);min-height:130px}
        #zh-g{grid-row:1/4;font-family:'Ma Shan Zheng','KaiTi',serif;font-size:clamp(2.6rem,9vw,4.4rem);line-height:1.05;color:var(--oroclaro);text-shadow:0 0 14px rgba(255,200,80,.5);
            min-width:3.3ch;text-align:center}
        #py{color:var(--oro);letter-spacing:.12em;min-height:1.3em}
        #es-g{font-size:1.5rem;font-weight:700}
        #nota{font-size:.9rem;opacity:.9}
        .acciones{grid-column:2;display:flex;gap:8px;flex-wrap:wrap;margin-top:4px}
        .acciones button{padding:5px 12px;font-size:.85rem}

        .chispa{position:fixed;z-index:50;width:6px;height:6px;border-radius:50%;background:var(--oroclaro);box-shadow:0 0 8px #ffb703;pointer-events:none;
            animation:chispa .8s ease-out forwards}
        @keyframes chispa{to{transform:translate(var(--dx),var(--dy)) scale(.2);opacity:0}}
    </style>
</head>

<body>
    <div class="sol"></div>
    <div class="petalos" id="petalos"></div>
    <svg class="montanas" viewBox="0 0 1200 200" preserveAspectRatio="none" aria-hidden="true">
        <path d="M0 120 Q100 60 180 100 T330 50 T500 95 T650 45 T820 100 T1000 55 T1200 85 V200 H0Z" fill="rgba(255,200,150,.12)"/>
        <path d="M0 150 Q120 90 240 130 T440 90 T640 135 T860 95 T1060 130 T1200 110 V200 H0Z" fill="rgba(40,5,10,.5)"/>
        <path d="M0 180 Q150 140 300 170 T620 160 T920 175 T1200 150 V200 H0Z" fill="rgba(15,2,5,.8)"/>
    </svg>

    <div style="position:relative">
        <h1><?= $mytitle; ?></h1>
        <div class="sub">星期 · xīngqī = semana</div>
        <span class="sello">学</span>
    </div>

    <div class="hud">
        <span>Linternas encendidas: <b id="n">0</b>/<?= count($dias) ?></span>
        <button id="btn-desafio">Modo desafío</button>
        <button id="btn-sonido" class="on">Sonido: sí</button>
        <button id="btn-reinicio">Apagar todas</button>
    </div>

    <ul>
        <?php
        $i = 0;
        $total_dias = count($dias);

        while ($i < $total_dias):
        ?>
            <li class="farol" tabindex="0" role="button" style="--d:<?= $i ?>"
                data-zh="星期<?= $num[$i] ?>"
                data-py="<?= htmlspecialchars($pinyin[$i]) ?>"
                data-es="<?= htmlspecialchars($dias[$i]) ?>"
                data-nota="<?= htmlspecialchars($nota[$i]) ?>">
                <span class="cuerpo"><span class="sx">星期</span><span class="num"><?= $num[$i] ?></span></span>
                <span class="borla"></span>
                <span class="es"><?= htmlspecialchars($dias[$i]) ?></span>
            </li>
        <?php
            $i++;
        endwhile;
        ?>
    </ul>

    <div class="detalle">
        <div id="zh-g">星期</div>
        <div id="py">xīngqī</div>
        <div id="es-g">Toca una linterna</div>
        <div id="nota">Cada día se forma con 星期 («semana») más un número.</div>
        <div class="acciones">
            <button id="btn-oir">🔊 Escuchar</button>
            <button id="btn-pista" style="display:none">Pista</button>
        </div>
    </div>

    <script>
        const $ = id => document.getElementById(id);
        const faroles = [...document.querySelectorAll('.farol')];
        let sonido = true, desafio = false, objetivo = null, actual = null;
        const resueltos = new Set();

        /* Pétalos que caen */
        for (let k = 0; k < 16; k++) {
            const p = document.createElement('span');
            p.className = 'petalo';
            p.style.left = Math.random() * 100 + 'vw';
            p.style.animationDuration = (9 + Math.random() * 9) + 's';
            p.style.animationDelay = (-Math.random() * 14) + 's';
            $('petalos').appendChild(p);
        }

        function hablar(texto) {
            if (!sonido || !('speechSynthesis' in window)) return;
            const u = new SpeechSynthesisUtterance(texto);
            u.lang = 'zh-CN'; u.rate = .8;
            speechSynthesis.cancel(); speechSynthesis.speak(u);
        }

        function chispas(x, y) {
            for (let k = 0; k < 16; k++) {
                const c = document.createElement('span'), a = Math.random() * Math.PI * 2, d = 40 + Math.random() * 60;
                c.className = 'chispa'; c.style.left = x + 'px'; c.style.top = y + 'px';
                c.style.setProperty('--dx', Math.cos(a) * d + 'px'); c.style.setProperty('--dy', Math.sin(a) * d + 'px');
                document.body.appendChild(c); setTimeout(() => c.remove(), 850);
            }
        }

        const encendidas = () => faroles.filter(f => f.classList.contains('encendida')).length;
        const hud = () => $('n').textContent = encendidas();

        function mostrar(li) {
            actual = li;
            $('zh-g').textContent = li.dataset.zh; $('py').textContent = li.dataset.py;
            $('es-g').textContent = li.dataset.es; $('nota').textContent = li.dataset.nota;
        }

        function celebrar() {
            $('zh-g').textContent = '太棒了'; $('py').textContent = 'tài bàng le';
            $('es-g').textContent = '¡Fantástico!'; $('nota').textContent = '¡Has encendido toda la semana china!';
            hablar('太棒了');
            for (let k = 0; k < 6; k++) setTimeout(() => chispas(Math.random() * innerWidth, Math.random() * innerHeight * .6), k * 250);
        }

        /* Modo desafío */
        function siguiente() {
            const pend = faroles.filter(f => !resueltos.has(f));
            if (!pend.length) return celebrar();
            objetivo = pend[Math.floor(Math.random() * pend.length)];
            $('zh-g').textContent = '？'; $('py').textContent = '';
            $('es-g').textContent = 'Encuentra: ' + objetivo.dataset.es;
            $('nota').textContent = 'Toca la linterna con el carácter correcto.';
        }

        function reiniciar() {
            faroles.forEach(f => f.classList.remove('encendida', 'error'));
            resueltos.clear(); hud();
            if (desafio) siguiente();
        }

        faroles.forEach(li => {
            li.addEventListener('click', e => {
                const r = li.getBoundingClientRect();
                chispas(e.clientX || r.left + r.width / 2, e.clientY || r.top + r.height / 2);
                if (!desafio) {
                    li.classList.add('encendida'); mostrar(li); hablar(li.dataset.zh); hud();
                    if (encendidas() === faroles.length) setTimeout(celebrar, 700);
                    return;
                }
                if (resueltos.has(li)) return;
                if (li === objetivo) {
                    resueltos.add(li); li.classList.add('encendida'); hud(); hablar(li.dataset.zh);
                    $('zh-g').textContent = li.dataset.zh; $('py').textContent = li.dataset.py;
                    $('nota').textContent = '¡Correcto! ' + li.dataset.nota;
                    setTimeout(siguiente, 1500);
                } else {
                    li.classList.remove('error'); void li.offsetWidth; li.classList.add('error');
                    $('nota').textContent = `Esa linterna es ${li.dataset.es} (${li.dataset.zh}). ¡Sigue buscando!`;
                }
            });
            li.addEventListener('keydown', e => { if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); li.click(); } });
        });

        $('btn-desafio').addEventListener('click', e => {
            desafio = !desafio;
            document.body.classList.toggle('desafio', desafio);
            e.currentTarget.classList.toggle('on', desafio);
            e.currentTarget.textContent = desafio ? 'Salir del desafío' : 'Modo desafío';
            $('btn-pista').style.display = desafio ? '' : 'none';
            faroles.forEach(f => f.classList.remove('encendida')); resueltos.clear(); hud();
            if (desafio) siguiente();
            else { $('zh-g').textContent = '星期'; $('py').textContent = 'xīngqī'; $('es-g').textContent = 'Toca una linterna'; $('nota').textContent = 'Cada día se forma con 星期 («semana») más un número.'; }
        });

        $('btn-pista').addEventListener('click', () => {
            if (!objetivo) return;
            $('py').textContent = objetivo.dataset.py;
            $('nota').textContent = 'Pista: ' + objetivo.dataset.nota;
        });
        $('btn-oir').addEventListener('click', () => {
            const t = desafio ? (objetivo && resueltos.has(objetivo) ? objetivo.dataset.zh : '') : (actual ? actual.dataset.zh : '星期');
            if (t) hablar(t);
        });
        $('btn-sonido').addEventListener('click', e => {
            sonido = !sonido; e.currentTarget.classList.toggle('on', sonido);
            e.currentTarget.textContent = 'Sonido: ' + (sonido ? 'sí' : 'no');
            if (!sonido && 'speechSynthesis' in window) speechSynthesis.cancel();
        });
        $('btn-reinicio').addEventListener('click', reiniciar);
    </script>
</body>

</html>