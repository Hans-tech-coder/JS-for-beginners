const pname = document.querySelector(".studentname");
    const pmmessage = document.querySelector(".message");

    const name = prompt('Enter your name: ');

    pname.textContent = `Hi, ${name}`;
    pmmessage.textContent = 'Welcome to Basic JS for Web Dev!';