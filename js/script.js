

(function () {
  "use strict";

  /* ---- Navbar: Shrink on scroll ---- */
  const nav = document.getElementById("mainNav");
  // On inner pages the navbar already has .scrolled baked in; keep it always
  const navAlwaysScrolled = nav.classList.contains("scrolled");

  window.addEventListener("scroll", () => {
    if (window.scrollY > 60 || navAlwaysScrolled) {
      nav.classList.add("scrolled");
    } else {
      nav.classList.remove("scrolled");
    }
    toggleBackToTop();
  });

  /* ---- Close mobile menu on link click ---- */
  document.querySelectorAll(".navbar-nav .nav-link").forEach((link) => {
    link.addEventListener("click", () => {
      const collapse = document.getElementById("navbarNav");
      const bsCollapse = bootstrap.Collapse.getInstance(collapse);
      if (bsCollapse) bsCollapse.hide();
    });
  });

  /* ---- Back To Top ---- */
  const backToTopBtn = document.getElementById("backToTop");

  function toggleBackToTop() {
    if (window.scrollY > 400) {
      backToTopBtn.classList.add("show");
    } else {
      backToTopBtn.classList.remove("show");
    }
  }

  backToTopBtn.addEventListener("click", () => {
    window.scrollTo({ top: 0, behavior: "smooth" });
  });

  /* ---- Scroll-reveal animation ---- */
  const fadeEls = document.querySelectorAll(
    ".section-title, .section-label, .about-stat, " +
    ".menu-item, .gallery-item, .chef-card, .menu-tab"
  );

  fadeEls.forEach((el) => el.setAttribute("data-fade", ""));

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("visible");
          observer.unobserve(entry.target); // animate only once
        }
      });
    },
    { threshold: 0.15 }
  );

  document.querySelectorAll("[data-fade]").forEach((el) => observer.observe(el));

  /* ---- Reservation form ---- */
  const form = document.getElementById("reservationForm");

  if (form) {
    form.addEventListener("submit", (e) => {
      e.preventDefault();

      if (!form.checkValidity()) {
        form.classList.add("was-validated");
        return;
      }

      // Simulate successful submission
      const btn = form.querySelector('button[type="submit"]');
      const original = btn.innerHTML;

      btn.disabled = true;
      btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Envoi…';

      setTimeout(() => {
        btn.innerHTML = '<i class="bi bi-check-circle me-2"></i>Réservation Confirmée !';
        btn.classList.replace("btn-gold", "btn-success");

        setTimeout(() => {
          btn.innerHTML = original;
          btn.classList.replace("btn-success", "btn-gold");
          btn.disabled = false;
          form.reset();
          form.classList.remove("was-validated");
        }, 3500);
      }, 1800);
    });
  }

  /* ---- Set min date on date input (today) ---- */
  const dateInput = document.querySelector('input[type="date"]');
  if (dateInput) {
    const today = new Date().toISOString().split("T")[0];
    dateInput.setAttribute("min", today);
  }

  /* ---- Active nav-link on scroll (Scrollspy highlight) ---- */
  const sections = document.querySelectorAll("section[id]");
  const navLinks = document.querySelectorAll("#mainNav .nav-link");

  const spyObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          navLinks.forEach((link) => link.classList.remove("active"));
          const active = document.querySelector(
            `#mainNav a[href="#${entry.target.id}"]`
          );
          if (active) active.classList.add("active");
        }
      });
    },
    { rootMargin: "-40% 0px -55% 0px" }
  );

  sections.forEach((s) => spyObserver.observe(s));
})();
