
document.addEventListener('DOMContentLoaded', () => {


    gsap.from(".social, .contact, .competence", {
        duration: 1.5,
        stagger: 0.1,
        delay: 2,
        opacity: 0,
        scaleY: -2,
        ease: "back",
    }, 0.1);


//-------------------------Anim text JOHN BARRY---------------------------------------

    const text1 = new SplitType(".text-image h1");

    let tl = gsap.timeline()

    tl.from(text1.chars, {
        delay: 1,
        yPercent: 100,
        xPercent: 3000,
        duration: 1.2,
        stagger: .1,
        ease: "back",
    });

//-----------------------Anim image-------------
    
    // gsap.fromTo(".image img", {
    //     scaleX: 0
    // }, {
    //     scaleX: 1,
    //     duration: 2,
    //     stagger: 0.2,
    //     ease: "power1.out"
    // });

    //--------------------------Mouse trail--------------------------------------//

    // dots is an array of Dot objects,
    // mouse is an object used to track the X and Y position
    // of the mouse, set with a mousemove event listener below
    var dots = [],
        mouse = {
            x: 0,
            y: 0
        },
        hidden = false,
        hideTimer = null,
        firstDot = null;

    // The Dot object used to scaffold the dots
    class Dot {
        constructor(size) {
            this.x = 0;
            this.y = 0;
            this.size = size;
            this.node = (function () {
                var n = document.createElement("div");
                n.className = "trail";
                var dot = document.createElement("div");
                dot.className = "white-dot";
                n.appendChild(dot);
                document.body.appendChild(n);
                return n;
            }());
        }

        draw() {
            this.node.style.left = (this.x - this.size / 2) + "px";
            this.node.style.top = (this.y - this.size / 2) + "px";
            this.node.style.width = this.size + "px";
            this.node.style.height = this.size + "px";
        }
    }

    

    // Creates the Dot objects, populates the dots array
    for (var i = 0; i < 15; i++) {
        var size = 30 - i * 1.5;
        var d = new Dot(size);
        dots.push(d);

        if (i === 0) {
            firstDot = d;
        }
    }

    // This is the screen redraw function
    function draw() {
        // Make sure the mouse position is set everytime
        // draw() is called.
        var x = mouse.x,
            y = mouse.y;

        if (hidden) {
            // Hide all the dots except for the first one
            dots.forEach(function (dot) {
                if (dot !== firstDot) {
                    dot.node.style.display = "none";
                }
            });
        } else {
            // Show all the dots
            dots.forEach(function (dot) {
                dot.node.style.display = "";
            });

            // This loop is where all the 90s magic happens
            dots.forEach(function (dot, index, dots) {
                var nextDot = dots[index + 1] || dots[0];

                dot.x = x;
                dot.y = y;
                dot.draw();
                x += (nextDot.x - dot.x) * .6;
                y += (nextDot.y - dot.y) * .6;
            });
        }
    }

    addEventListener("mousemove", function (event) {
        mouse.x = event.pageX;
        mouse.y = event.pageY;

        if (hidden) {
            // Show the first dot only
            firstDot.node.style.display = "";
            hidden = false;
        }

        // Clear the hide timer
        clearTimeout(hideTimer);

        // Set a new hide timer
        hideTimer = setTimeout(function () {
            hidden = true;
        }, 100);
    });

    // animate() calls draw() then recursively calls itself
    // everytime the screen repaints via requestAnimationFrame().
    function animate() {
        draw();
        requestAnimationFrame(animate);
    }

    // And get it started by calling animate().
    animate();









});
