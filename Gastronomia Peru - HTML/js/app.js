let intro = document.querySelector('.intro');
let logoSpan = document.querySelectorAll('.logo');
let logoImg = document.querySelector('.logo-img');

window.addEventListener('DOMContentLoaded', () => {
  setTimeout(() => {
    logoSpan.forEach((span, idx) => {
      setTimeout(() => {
        span.classList.add('active');
      }, (idx + 1) * 200);
    });

    setTimeout(() => {
      logoSpan.forEach((span) => {
        span.classList.remove('active');
        span.classList.add('fade');
      });

      setTimeout(() => {
        logoImg.classList.add('show');
      }, 800);

    }, logoSpan.length * 200 + 1000);
  }, 800);

  setTimeout(() => {
    intro.style.top = '-100vh';
  }, 6000);
});


document.addEventListener('DOMContentLoaded', () => {
  const track = document.querySelector('.cf-track');
  const items = track ? Array.from(track.children) : [];
  const prev = document.querySelector('.cf-prev');
  const next = document.querySelector('.cf-next');
  const dots = document.querySelectorAll('.cf-dot');
  if (!track || items.length === 0) return;

  let index = Math.floor(items.length / 2);

  function update() {
    const itemWidth = items[0].getBoundingClientRect().width + 28; // ancho + gap
    const container = document.querySelector('.cf-window').getBoundingClientRect().width;

    const translateX = container / 2 - itemWidth * (index + 0.5);
    track.style.transform = `translateX(${translateX}px)`;

    items.forEach((li, i) => {
      const diff = i - index;
      li.dataset.pos = Math.max(-3, Math.min(3, diff));
    });

    dots.forEach((d, i) => d.classList.toggle('is-active', i === (index % items.length + items.length) % items.length));
  }

  function go(delta) {
    index = (index + delta + items.length) % items.length;
    update();
  }

  prev?.addEventListener('click', () => go(-1));
  next?.addEventListener('click', () => go(1));

  dots.forEach((d, i) =>
    d.addEventListener('click', () => {
      index = i;
      update();
    })
  );

  window.addEventListener('keydown', (e) => {
    if (e.key === 'ArrowLeft') go(-1);
    if (e.key === 'ArrowRight') go(1);
  });

  let timer = setInterval(() => go(1), 5000);
  track.addEventListener('mouseenter', () => clearInterval(timer));
  track.addEventListener('mouseleave', () => {
    timer = setInterval(() => go(1), 5000);
  });

  update();

  window.addEventListener('resize', update);
});

document.addEventListener('DOMContentLoaded', () => {
  const tileTriggers = document.querySelectorAll('.food-tile, .food-tile-button');

  function abrirModal(slug) {
    const modal = document.getElementById(`modal-${slug}`);
    if (!modal) return;

    const scrollY = window.scrollY || window.pageYOffset;
    modal.style.top = scrollY + 'px';
    modal.classList.add('is-open');
  }

  function cerrarModal(modal) {
    modal.classList.remove('is-open');
    modal.style.top = '0px';
  }

  tileTriggers.forEach(el => {
    el.addEventListener('click', (e) => {
      const slug = e.currentTarget.dataset.platillo 
                || e.currentTarget.closest('.food-tile')?.dataset.platillo;
      if (!slug) return;
      abrirModal(slug);
    });
  });

  document.querySelectorAll('.food-modal-close').forEach(btn => {
    btn.addEventListener('click', () => {
      const id = btn.dataset.close;
      const modal = document.getElementById(id);
      if (modal) cerrarModal(modal);
    });
  });

  document.querySelectorAll('.food-modal-backdrop').forEach(backdrop => {
    backdrop.addEventListener('click', (e) => {
      if (e.target === backdrop) {
        cerrarModal(backdrop);
      }
    });
  });

  window.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      document
        .querySelectorAll('.food-modal-backdrop.is-open')
        .forEach(m => cerrarModal(m));
    }
  });

  window.addEventListener('scroll', () => {
    const scrollY = window.scrollY || window.pageYOffset;
    document
      .querySelectorAll('.food-modal-backdrop.is-open')
      .forEach(m => {
        m.style.top = scrollY + 'px';
      });
  });
});
