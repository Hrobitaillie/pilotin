document.addEventListener('DOMContentLoaded', () => {
    console.log("trigger");

    const random = () =>{
        const r = Math.floor(Math.random() * (100 - 50 + 1)) + 50;
        console.log(r);
        return r 
    }

    gsap.registerPlugin(ScrollTrigger)
    const paralax = gsap.utils.toArray(".paralax")
    paralax.forEach(instance => {
        const paralaxTL = gsap.timeline({ scrollTrigger: {
            trigger:instance,
            scrub: Math.floor(Math.random() * 4) + 1,
        }})
        const y = random
        paralaxTL.fromTo(instance, {
            yPercent: y
        },{
            yPercent: -y
        })
    });
    
})