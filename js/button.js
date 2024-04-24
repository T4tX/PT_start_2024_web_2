var count = 0
mybutton.onclick = function() {
    count++
    if(count%2==0){
        demo.innerHTML = ''
    } else {
        var img = document.createElement("img")
        img.src = 'https://img.freepik.com/free-photo/colorful-design-with-spiral-design_188544-9588.jpg?size=626&ext=jpg&ga=GA1.1.553209589.1713830400&semt=sph'
        demo.appendChild(img)
    }
}