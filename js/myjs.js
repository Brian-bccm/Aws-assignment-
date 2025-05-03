function dropdown(category) {
  var div = document.getElementById("details")

  if (div.style.maxHeight == "1e+06px") {
    div.style.maxHeight = "0px"
  } else {
    div.style.maxHeight = "1000000px"
  }
}
// JS For Admin

const sideMenu = document.querySelector("aside")
const menuBtn = document.getElementById("menu-btn")
const closeBtn = document.getElementById("close-btn")

const darkMode = document.querySelector(".dark-mode")

menuBtn.addEventListener("click", () => {
  sideMenu.style.display = "block"
})

closeBtn.addEventListener("click", () => {
  sideMenu.style.display = "none"
})

darkMode.addEventListener("click", () => {
  document.body.classList.toggle("dark-mode-variables")
  darkMode.querySelector("span:nth-child(1)").classList.toggle("active")
  darkMode.querySelector("span:nth-child(2)").classList.toggle("active")
})

// for analyze in admin

const totalSalesCircle = document.getElementById("totalSalesCircle")
const circleRadius = 36
const circleCircumference = 2 * Math.PI * circleRadius

function updateSalesCircle(currentTotalSales, previousTotalSales) {
  // Calculate percentage changes (handle potential division by zero)
  const percentageChange =
    ((currentTotalSales - (previousTotalSales || 0)) /
      (previousTotalSales || 1)) *
    100

  // Calculate stroke-dashoffset based on percentage change (consider improvement vs decline)
  let targetStrokeDashoffset
  if (percentageChange >= 0) {
    // Sales improvement or no change
    targetStrokeDashoffset = circleCircumference * (1 - percentageChange / 100)
  } else {
    // Sales decline (visually show a decrease)
    targetStrokeDashoffset =
      circleCircumference * (1 + Math.abs(percentageChange) / 100)
  }

  // Update circle animation
  totalSalesCircle.style.strokeDashoffset = targetStrokeDashoffset
}

// Replace with your actual data retrieval methods
const currentTotalSales = 250 // Replace with current sales data
const previousTotalSales = 4 // Replace with previous sales data (or 0 if no data)

updateSalesCircle(currentTotalSales, previousTotalSales)
