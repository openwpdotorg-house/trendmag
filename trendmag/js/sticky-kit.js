/*
 * jQuery-stickit v0.1.12
 * https://github.com/emn178/jquery-stickit
 *
 * Copyright 2014-2015, emn178@gmail.com
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */
(function (b, g, k, u) {
    function c(a, d) {
        this.options = d || {};
        this.options.scope = this.options.scope || h.Parent;
        this.options.className = this.options.className || "stick";
        this.options.top = this.options.top || 0;
        this.options.extraHeight = this.options.extraHeight || 0;
        this.lastY = this.offsetY = 0;
        this.element = b(a);
        this.stick = e.None;
        this.spacer = b("<div />");
        this.spacer[0].id = a.id;
        this.spacer[0].className = a.className;
        this.spacer[0].style.cssText = a.style.cssText;
        this.spacer.addClass("jquery-stickit-spacer");
        this.spacer.css({display:"none",
            visibility:"hidden"});
        this.spacer.insertAfter(this.element);
        "static" == this.element.parent().css("position") && this.element.parent().css("position", "relative");
        this.bound();
        this.precalculate();
        this.store()
    }

    function l() {
        m = g.innerHeight || k.documentElement.clientHeight;
        b(":jquery-stickit").each(function () {
            b(this).data("jquery-stickit").resize()
        })
    }

    function r() {
        b(":jquery-stickit").each(function () {
            b(this).data("jquery-stickit").locate()
        })
    }

    var n = -1 != navigator.userAgent.indexOf("MSIE 7.0"), p = n ? -2 : 0, h = g.StickScope =
    {Parent:0, Document:1}, e = {None:0, Fixed:1, Absolute:2}, q = !1;
    b.expr[":"]["jquery-stickit"] = function (a) {
        return!!b(a).data("jquery-stickit")
    };
    c.prototype.store = function () {
        var a = this.element[0];
        this.origStyle = {width:a.style.width, position:a.style.position, left:a.style.left, top:a.style.top, bottom:a.style.bottom, zIndex:a.style.zIndex}
    };
    c.prototype.restore = function () {
        this.element.css(this.origStyle)
    };
    c.prototype.bound = function () {
        var a = this.element;
        if (n || "border-box" != a.css("box-sizing"))this.extraWidth = 0; else {
            var d =
                parseInt(a.css("border-left-width")) || 0, f = parseInt(a.css("border-right-width")) || 0, b = parseInt(a.css("padding-left")) || 0, c = parseInt(a.css("padding-right")) || 0;
            this.extraWidth = d + f + b + c
        }
        this.margin = {top:parseInt(a.css("margin-top")) || 0, bottom:parseInt(a.css("margin-bottom")) || 0, left:parseInt(a.css("margin-left")) || 0, right:parseInt(a.css("margin-right")) || 0};
        this.parent = {border:{bottom:parseInt(a.parent().css("border-bottom-width")) || 0}}
    };
    c.prototype.precalculate = function () {
        this.baseTop = this.margin.top +
            this.options.top;
        this.basePadding = this.baseTop + this.margin.bottom;
        this.baseParentOffset = this.options.extraHeight - this.parent.border.bottom;
        this.offsetHeight = Math.max(this.element.height() - m, 0)
    };
    c.prototype.reset = function () {
        this.stick = e.None;
        this.spacer.hide();
        this.spacer.css("width", "");
        this.restore();
        this.element.removeClass(this.options.className)
    };
    c.prototype.setAbsolute = function (a) {
        this.stick == e.None && this.element.addClass(this.options.className);
        this.stick = e.Absolute;
        this.element.css({width:this.element.width() +
            this.extraWidth + "px", position:"absolute", top:this.origStyle.top, left:a + "px", bottom:-this.options.extraHeight + "px", "z-index":99})
    };
    c.prototype.setFixed = function (a, d, f) {
        this.stick == e.None && this.element.addClass(this.options.className);
        this.stick = e.Fixed;
        this.lastY = d;
        this.offsetY = f;
        this.element.css({width:this.element.width() + this.extraWidth + "px", position:"fixed", top:this.options.top + f + "px", left:a + "px", bottom:this.origStyle.bottom, "z-index":100})
    };
    c.prototype.updateScroll = function (a) {
        0 != this.offsetHeight &&
        (this.offsetY = Math.max(this.offsetY + a - this.lastY, -this.offsetHeight), this.offsetY = Math.min(this.offsetY, 0), this.lastY = a, this.element.css("top", this.options.top + this.offsetY + "px"))
    };
    c.prototype.locate = function () {
        var a, d, f, b = this.element, c = this.spacer;
        switch (this.stick) {
            case e.Fixed:
                a = c[0].getBoundingClientRect();
                d = a.top - this.baseTop;
                0 <= d ? this.reset() : this.options.scope == h.Parent ? (a = b.parent()[0].getBoundingClientRect(), a.bottom + this.baseParentOffset + this.offsetHeight <= b.outerHeight(!1) + this.basePadding ?
                    this.setAbsolute(this.spacer.position().left) : this.updateScroll(a.bottom)) : this.updateScroll(a.bottom);
                break;
            case e.Absolute:
                a = c[0].getBoundingClientRect();
                d = a.top - this.baseTop;
                f = a.left - this.margin.left;
                0 <= d ? this.reset() : (a = b.parent()[0].getBoundingClientRect(), a.bottom + this.baseParentOffset + this.offsetHeight > b.outerHeight(!1) + this.basePadding && this.setFixed(f + p, a.bottom, -this.offsetHeight));
                break;
            default:
                a = b[0].getBoundingClientRect();
                d = a.top - this.baseTop;
                if (0 <= d)break;
                c.height(b.height());
                c.show();
                f = a.left - this.margin.left;
                this.options.scope == h.Document ? this.setFixed(f, a.bottom, 0) : b.parent()[0].getBoundingClientRect().bottom + this.baseParentOffset <= b.outerHeight(!1) + this.basePadding ? this.setAbsolute(this.element.position().left) : this.setFixed(f + p, a.bottom, 0);
                c.width() || c.width(b.width())
        }
    };
    c.prototype.resize = function () {
        this.bound();
        this.precalculate();
        if (this.stick != e.None) {
            var a = this.element, b = this.spacer;
            a.width(b.width());
            b.height(a.height());
            this.stick == e.Fixed && (b = this.spacer[0].getBoundingClientRect().left -
                this.margin.left, a.css("left", b + "px"));
            this.locate()
        }
    };
    c.prototype.destroy = function () {
        this.reset();
        this.spacer.remove();
        this.element.removeData("jquery-stickit")
    };
    var m, t = ["destroy"];
    b.fn.stickit = function (a, d) {
        "string" == typeof a ? -1 != b.inArray(a, t) && this.each(function () {
            var c = b(this).data("jquery-stickit");
            c && c[a].apply(c, d)
        }) : (d = a, this.each(function () {
            var a = new c(this, d);
            b(this).data("jquery-stickit", a);
            a.locate()
        }), q || (q = !0, l(), b(k).ready(function () {
            b(g).bind("resize", l).bind("scroll", r)
        })));
        return this
    }
})(jQuery,
    window, document);