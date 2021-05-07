console.log("tjena")

const number = document.getElementById("personnummer")
const btn = document.getElementById("validBtn")

console.log(number.target)

number.addEventListener("change", (e) => {
  console.log(e.target.value)
})

btn.addEventListener("click", (e) => {
  e.preventDefault();
  console.log("hejsan")
})