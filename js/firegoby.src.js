(function(){
    var a = alice.init();
    a.wobble(
        "parallax-02",
        1,
        "topright",
        "2000ms",
        "linear",
        "0ms",
        "infinite",
        "normal",
        "running"
    );
    a.pendulum(
        "parallax-03",
        5,
        0,
        "2000ms",
        "ease-in-out",
        "0ms",
        "infinite",
        "alternate",
        "running"
    );
    jQuery('#parallax .parallax-layer').parallax({
        mouseport: jQuery('#parallax')
    });
})();
