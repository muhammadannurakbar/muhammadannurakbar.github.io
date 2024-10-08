document.getElementById('toggle-theme').addEventListener('click', function() {
    const body = document.body;
    if (body.classList.contains('light-mode')) {
        body.classList.remove('light-mode');
        body.classList.add('dark-mode');
        this.textContent = "Switch to Light Mode"; 
    } else {
        body.classList.remove('dark-mode');
        body.classList.add('light-mode');
        this.textContent = "Switch to Dark Mode"; 
    }
});

document.getElementById('hamburger').addEventListener('click', function() {
    document.getElementById('navbar').classList.toggle('active');
});

document.getElementById('hamburger').addEventListener('click', function() {
    document.getElementById('navbar').classList.toggle('active');
});

const popup = document.getElementById('popup');
document.getElementById('openPopup').addEventListener('click', () => {
    popup.style.display = 'block';
});

document.getElementById('closePopup').addEventListener('click', () => {
    popup.style.display = 'none';
});
