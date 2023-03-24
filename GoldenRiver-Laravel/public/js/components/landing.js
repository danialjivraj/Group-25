// const category_track = document.getElementsByClassName("category-track")[0];
// category_track.dataset.percentage = 0;
// const featured_track = document.getElementsByClassName("featured-track")[0];
// featured_track.dataset.percentage = 0;

// const activateTrack = (track) => {
//   const handleOnDown = e => track.dataset.mouseDownAt = e.clientX;

//   const handleOnUp = () => {
//     track.dataset.mouseDownAt = "0";  
//     track.dataset.prevPercentage = track.dataset.percentage;
//   }

//   const handleOnMove = e => {
//     if(track.dataset.mouseDownAt === "0") return;

//     const mouseDelta = parseFloat(track.dataset.mouseDownAt) - e.clientX,
//           maxDelta = window.innerWidth / 2;

//     const percentage = (mouseDelta / maxDelta) * -100,
//           nextPercentageUnconstrained = parseFloat(track.dataset.prevPercentage) + percentage,
//           nextPercentage = Math.max(Math.min(nextPercentageUnconstrained, 0), -100);

//     track.dataset.percentage = nextPercentage;

//     track.animate({
//       transform: `translate(${nextPercentage}%, -50%)`
//     }, { duration: 1200, fill: "forwards" });

//     const images = track.getElementsByClassName("category-image");
//     for (const image of images) {
//       image.animate({
//         objectPosition: `${100 + nextPercentage}% center`
//       }, { duration: 1200, fill: "forwards" });
//     }
//   }

//   /* -- Had to add extra lines for touch events -- */

//   track.addEventListener("mousedown", e => handleOnDown(e));

//   track.addEventListener("touchstart", e => handleOnDown(e.touches[0]));

//   track.addEventListener("mouseup", e => handleOnUp(e));

//   track.addEventListener("touchend", e => handleOnUp(e.touches[0]));

//   track.addEventListener("mousemove", e => handleOnMove(e));

//   track.addEventListener("touchmove", e => handleOnMove(e.touches[0]));
// }

// activateTrack(category_track);
// activateTrack(featured_track);
