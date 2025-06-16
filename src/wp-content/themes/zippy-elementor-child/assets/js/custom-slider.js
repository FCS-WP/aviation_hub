$(function () {
  var swiper = new Swiper(".zippy-banner-slider", {
    loop: true,
  });

  swiper.on("slideChange", function () {
    document
      .querySelectorAll(".custom-pagination-item")
      .forEach((el) => el.classList.remove("active"));
    const realIndex = swiper.realIndex;
    document
      .querySelectorAll(".custom-pagination-item")
      [realIndex]?.classList.add("active");
  });

  document.querySelectorAll(".custom-pagination-item").forEach((el, index) => {
    el.addEventListener("click", () => {
      swiper.slideToLoop(index);
    });
  });
});
