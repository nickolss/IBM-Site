const box = document.getElementById("box");
const img = document.querySelector("img.vg-img");

box.addEventListener("mousemove", (e) =>{
	const x = e.clientX - e.target.offsetLeft;
	const y = e.clientY - e.target.offsetTop;

	console.log(x, y);

	img.style.transformOrigin = `${x}px ${y}px`;
	img.style.transform = "scale(2)";
})

box.addEventListener("mouseleave", () => {
    img.style.transformOrigin = "center center";
    img.style.transform = "scale(1)";
})


const box1 = document.getElementById("box1");
const img1 = document.querySelector("img.vg-img1");

box1.addEventListener("mousemove", (e) =>{
	const x = e.clientX - e.target.offsetLeft;
	const y = e.clientY - e.target.offsetTop;

	console.log(x, y);

	img1.style.transformOrigin = `${x}px ${y}px`;
	img1.style.transform = "scale(2)";
})

box1.addEventListener("mouseleave", () => {
    img1.style.transformOrigin = "center center";
    img1.style.transform = "scale(1)";
})
