!function (e) {
    var t, o, n = e.event;
    t = n.special.debouncedresize = {setup:function () {
        e(this).on("resize", t.handler)
    }, teardown:function () {
        e(this).off("resize", t.handler)
    }, handler:function (e, s) {
        var r = this, i = arguments, a = function () {
            e.type = "debouncedresize", n.dispatch.apply(r, i)
        };
        o && clearTimeout(o), s ? a() : o = setTimeout(a, t.threshold)
    }, threshold:150}
}(jQuery);