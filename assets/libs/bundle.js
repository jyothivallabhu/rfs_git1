/*------------------------------------------------------------------

Project Name :      Vetra - HTML Admin Dashboard Template
Version :           1.0
Author :            Laborasyon
Author Portfolio :  https://themeforest.net/user/laborasyon/portfolio
Author Website :    https://laborasyon.com/

------------------------------------------------------------------*/

/*------------------------------------------------------------------

 [TABLE OF CONTENTS]

 1 - jQuery v3.4.1
 2 - Bootstrap v5.0.0-beta1
 3 - Sweet Alert 2
 4 - jquery.nicescroll v3.7.6

------------------------------------------------------------------*/

/*! jQuery v3.4.1 | (c) JS Foundation and other contributors | jquery.org/license */
!(function (e, t) {
    "use strict";
    "object" == typeof module && "object" == typeof module.exports
        ? (module.exports = e.document
              ? t(e, !0)
              : function (e) {
                    if (!e.document) throw new Error("jQuery requires a window with a document");
                    return t(e);
                })
        : t(e);
})("undefined" != typeof window ? window : this, function (C, e) {
    "use strict";
    var t = [],
        E = C.document,
        r = Object.getPrototypeOf,
        s = t.slice,
        g = t.concat,
        u = t.push,
        i = t.indexOf,
        n = {},
        o = n.toString,
        v = n.hasOwnProperty,
        a = v.toString,
        l = a.call(Object),
        y = {},
        m = function (e) {
            return "function" == typeof e && "number" != typeof e.nodeType;
        },
        x = function (e) {
            return null != e && e === e.window;
        },
        c = { type: !0, src: !0, nonce: !0, noModule: !0 };
    function b(e, t, n) {
        var r,
            i,
            o = (n = n || E).createElement("script");
        if (((o.text = e), t)) for (r in c) (i = t[r] || (t.getAttribute && t.getAttribute(r))) && o.setAttribute(r, i);
        n.head.appendChild(o).parentNode.removeChild(o);
    }
    function w(e) {
        return null == e ? e + "" : "object" == typeof e || "function" == typeof e ? n[o.call(e)] || "object" : typeof e;
    }
    var f = "3.4.1",
        k = function (e, t) {
            return new k.fn.init(e, t);
        },
        p = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
    function d(e) {
        var t = !!e && "length" in e && e.length,
            n = w(e);
        return !m(e) && !x(e) && ("array" === n || 0 === t || ("number" == typeof t && 0 < t && t - 1 in e));
    }
    (k.fn = k.prototype = {
        jquery: f,
        constructor: k,
        length: 0,
        toArray: function () {
            return s.call(this);
        },
        get: function (e) {
            return null == e ? s.call(this) : e < 0 ? this[e + this.length] : this[e];
        },
        pushStack: function (e) {
            var t = k.merge(this.constructor(), e);
            return (t.prevObject = this), t;
        },
        each: function (e) {
            return k.each(this, e);
        },
        map: function (n) {
            return this.pushStack(
                k.map(this, function (e, t) {
                    return n.call(e, t, e);
                })
            );
        },
        slice: function () {
            return this.pushStack(s.apply(this, arguments));
        },
        first: function () {
            return this.eq(0);
        },
        last: function () {
            return this.eq(-1);
        },
        eq: function (e) {
            var t = this.length,
                n = +e + (e < 0 ? t : 0);
            return this.pushStack(0 <= n && n < t ? [this[n]] : []);
        },
        end: function () {
            return this.prevObject || this.constructor();
        },
        push: u,
        sort: t.sort,
        splice: t.splice,
    }),
        (k.extend = k.fn.extend = function () {
            var e,
                t,
                n,
                r,
                i,
                o,
                a = arguments[0] || {},
                s = 1,
                u = arguments.length,
                l = !1;
            for ("boolean" == typeof a && ((l = a), (a = arguments[s] || {}), s++), "object" == typeof a || m(a) || (a = {}), s === u && ((a = this), s--); s < u; s++)
                if (null != (e = arguments[s]))
                    for (t in e)
                        (r = e[t]),
                            "__proto__" !== t &&
                                a !== r &&
                                (l && r && (k.isPlainObject(r) || (i = Array.isArray(r)))
                                    ? ((n = a[t]), (o = i && !Array.isArray(n) ? [] : i || k.isPlainObject(n) ? n : {}), (i = !1), (a[t] = k.extend(l, o, r)))
                                    : void 0 !== r && (a[t] = r));
            return a;
        }),
        k.extend({
            expando: "jQuery" + (f + Math.random()).replace(/\D/g, ""),
            isReady: !0,
            error: function (e) {
                throw new Error(e);
            },
            noop: function () {},
            isPlainObject: function (e) {
                var t, n;
                return !(!e || "[object Object]" !== o.call(e)) && (!(t = r(e)) || ("function" == typeof (n = v.call(t, "constructor") && t.constructor) && a.call(n) === l));
            },
            isEmptyObject: function (e) {
                var t;
                for (t in e) return !1;
                return !0;
            },
            globalEval: function (e, t) {
                b(e, { nonce: t && t.nonce });
            },
            each: function (e, t) {
                var n,
                    r = 0;
                if (d(e)) {
                    for (n = e.length; r < n; r++) if (!1 === t.call(e[r], r, e[r])) break;
                } else for (r in e) if (!1 === t.call(e[r], r, e[r])) break;
                return e;
            },
            trim: function (e) {
                return null == e ? "" : (e + "").replace(p, "");
            },
            makeArray: function (e, t) {
                var n = t || [];
                return null != e && (d(Object(e)) ? k.merge(n, "string" == typeof e ? [e] : e) : u.call(n, e)), n;
            },
            inArray: function (e, t, n) {
                return null == t ? -1 : i.call(t, e, n);
            },
            merge: function (e, t) {
                for (var n = +t.length, r = 0, i = e.length; r < n; r++) e[i++] = t[r];
                return (e.length = i), e;
            },
            grep: function (e, t, n) {
                for (var r = [], i = 0, o = e.length, a = !n; i < o; i++) !t(e[i], i) !== a && r.push(e[i]);
                return r;
            },
            map: function (e, t, n) {
                var r,
                    i,
                    o = 0,
                    a = [];
                if (d(e)) for (r = e.length; o < r; o++) null != (i = t(e[o], o, n)) && a.push(i);
                else for (o in e) null != (i = t(e[o], o, n)) && a.push(i);
                return g.apply([], a);
            },
            guid: 1,
            support: y,
        }),
        "function" == typeof Symbol && (k.fn[Symbol.iterator] = t[Symbol.iterator]),
        k.each("Boolean Number String Function Array Date RegExp Object Error Symbol".split(" "), function (e, t) {
            n["[object " + t + "]"] = t.toLowerCase();
        });
    var h = (function (n) {
        var e,
            d,
            b,
            o,
            i,
            h,
            f,
            g,
            w,
            u,
            l,
            T,
            C,
            a,
            E,
            v,
            s,
            c,
            y,
            k = "sizzle" + 1 * new Date(),
            m = n.document,
            S = 0,
            r = 0,
            p = ue(),
            x = ue(),
            N = ue(),
            A = ue(),
            D = function (e, t) {
                return e === t && (l = !0), 0;
            },
            j = {}.hasOwnProperty,
            t = [],
            q = t.pop,
            L = t.push,
            H = t.push,
            O = t.slice,
            P = function (e, t) {
                for (var n = 0, r = e.length; n < r; n++) if (e[n] === t) return n;
                return -1;
            },
            R = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
            M = "[\\x20\\t\\r\\n\\f]",
            I = "(?:\\\\.|[\\w-]|[^\0-\\xa0])+",
            W = "\\[" + M + "*(" + I + ")(?:" + M + "*([*^$|!~]?=)" + M + "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + I + "))|)" + M + "*\\]",
            $ = ":(" + I + ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" + W + ")*)|.*)\\)|)",
            F = new RegExp(M + "+", "g"),
            B = new RegExp("^" + M + "+|((?:^|[^\\\\])(?:\\\\.)*)" + M + "+$", "g"),
            _ = new RegExp("^" + M + "*," + M + "*"),
            z = new RegExp("^" + M + "*([>+~]|" + M + ")" + M + "*"),
            U = new RegExp(M + "|>"),
            X = new RegExp($),
            V = new RegExp("^" + I + "$"),
            G = {
                ID: new RegExp("^#(" + I + ")"),
                CLASS: new RegExp("^\\.(" + I + ")"),
                TAG: new RegExp("^(" + I + "|[*])"),
                ATTR: new RegExp("^" + W),
                PSEUDO: new RegExp("^" + $),
                CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + M + "*(even|odd|(([+-]|)(\\d*)n|)" + M + "*(?:([+-]|)" + M + "*(\\d+)|))" + M + "*\\)|)", "i"),
                bool: new RegExp("^(?:" + R + ")$", "i"),
                needsContext: new RegExp("^" + M + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + M + "*((?:-\\d)?\\d*)" + M + "*\\)|)(?=[^-]|$)", "i"),
            },
            Y = /HTML$/i,
            Q = /^(?:input|select|textarea|button)$/i,
            J = /^h\d$/i,
            K = /^[^{]+\{\s*\[native \w/,
            Z = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
            ee = /[+~]/,
            te = new RegExp("\\\\([\\da-f]{1,6}" + M + "?|(" + M + ")|.)", "ig"),
            ne = function (e, t, n) {
                var r = "0x" + t - 65536;
                return r != r || n ? t : r < 0 ? String.fromCharCode(r + 65536) : String.fromCharCode((r >> 10) | 55296, (1023 & r) | 56320);
            },
            re = /([\0-\x1f\x7f]|^-?\d)|^-$|[^\0-\x1f\x7f-\uFFFF\w-]/g,
            ie = function (e, t) {
                return t ? ("\0" === e ? "\ufffd" : e.slice(0, -1) + "\\" + e.charCodeAt(e.length - 1).toString(16) + " ") : "\\" + e;
            },
            oe = function () {
                T();
            },
            ae = be(
                function (e) {
                    return !0 === e.disabled && "fieldset" === e.nodeName.toLowerCase();
                },
                { dir: "parentNode", next: "legend" }
            );
        try {
            H.apply((t = O.call(m.childNodes)), m.childNodes), t[m.childNodes.length].nodeType;
        } catch (e) {
            H = {
                apply: t.length
                    ? function (e, t) {
                          L.apply(e, O.call(t));
                      }
                    : function (e, t) {
                          var n = e.length,
                              r = 0;
                          while ((e[n++] = t[r++]));
                          e.length = n - 1;
                      },
            };
        }
        function se(t, e, n, r) {
            var i,
                o,
                a,
                s,
                u,
                l,
                c,
                f = e && e.ownerDocument,
                p = e ? e.nodeType : 9;
            if (((n = n || []), "string" != typeof t || !t || (1 !== p && 9 !== p && 11 !== p))) return n;
            if (!r && ((e ? e.ownerDocument || e : m) !== C && T(e), (e = e || C), E)) {
                if (11 !== p && (u = Z.exec(t)))
                    if ((i = u[1])) {
                        if (9 === p) {
                            if (!(a = e.getElementById(i))) return n;
                            if (a.id === i) return n.push(a), n;
                        } else if (f && (a = f.getElementById(i)) && y(e, a) && a.id === i) return n.push(a), n;
                    } else {
                        if (u[2]) return H.apply(n, e.getElementsByTagName(t)), n;
                        if ((i = u[3]) && d.getElementsByClassName && e.getElementsByClassName) return H.apply(n, e.getElementsByClassName(i)), n;
                    }
                if (d.qsa && !A[t + " "] && (!v || !v.test(t)) && (1 !== p || "object" !== e.nodeName.toLowerCase())) {
                    if (((c = t), (f = e), 1 === p && U.test(t))) {
                        (s = e.getAttribute("id")) ? (s = s.replace(re, ie)) : e.setAttribute("id", (s = k)), (o = (l = h(t)).length);
                        while (o--) l[o] = "#" + s + " " + xe(l[o]);
                        (c = l.join(",")), (f = (ee.test(t) && ye(e.parentNode)) || e);
                    }
                    try {
                        return H.apply(n, f.querySelectorAll(c)), n;
                    } catch (e) {
                        A(t, !0);
                    } finally {
                        s === k && e.removeAttribute("id");
                    }
                }
            }
            return g(t.replace(B, "$1"), e, n, r);
        }
        function ue() {
            var r = [];
            return function e(t, n) {
                return r.push(t + " ") > b.cacheLength && delete e[r.shift()], (e[t + " "] = n);
            };
        }
        function le(e) {
            return (e[k] = !0), e;
        }
        function ce(e) {
            var t = C.createElement("fieldset");
            try {
                return !!e(t);
            } catch (e) {
                return !1;
            } finally {
                t.parentNode && t.parentNode.removeChild(t), (t = null);
            }
        }
        function fe(e, t) {
            var n = e.split("|"),
                r = n.length;
            while (r--) b.attrHandle[n[r]] = t;
        }
        function pe(e, t) {
            var n = t && e,
                r = n && 1 === e.nodeType && 1 === t.nodeType && e.sourceIndex - t.sourceIndex;
            if (r) return r;
            if (n) while ((n = n.nextSibling)) if (n === t) return -1;
            return e ? 1 : -1;
        }
        function de(t) {
            return function (e) {
                return "input" === e.nodeName.toLowerCase() && e.type === t;
            };
        }
        function he(n) {
            return function (e) {
                var t = e.nodeName.toLowerCase();
                return ("input" === t || "button" === t) && e.type === n;
            };
        }
        function ge(t) {
            return function (e) {
                return "form" in e
                    ? e.parentNode && !1 === e.disabled
                        ? "label" in e
                            ? "label" in e.parentNode
                                ? e.parentNode.disabled === t
                                : e.disabled === t
                            : e.isDisabled === t || (e.isDisabled !== !t && ae(e) === t)
                        : e.disabled === t
                    : "label" in e && e.disabled === t;
            };
        }
        function ve(a) {
            return le(function (o) {
                return (
                    (o = +o),
                    le(function (e, t) {
                        var n,
                            r = a([], e.length, o),
                            i = r.length;
                        while (i--) e[(n = r[i])] && (e[n] = !(t[n] = e[n]));
                    })
                );
            });
        }
        function ye(e) {
            return e && "undefined" != typeof e.getElementsByTagName && e;
        }
        for (e in ((d = se.support = {}),
        (i = se.isXML = function (e) {
            var t = e.namespaceURI,
                n = (e.ownerDocument || e).documentElement;
            return !Y.test(t || (n && n.nodeName) || "HTML");
        }),
        (T = se.setDocument = function (e) {
            var t,
                n,
                r = e ? e.ownerDocument || e : m;
            return (
                r !== C &&
                    9 === r.nodeType &&
                    r.documentElement &&
                    ((a = (C = r).documentElement),
                    (E = !i(C)),
                    m !== C && (n = C.defaultView) && n.top !== n && (n.addEventListener ? n.addEventListener("unload", oe, !1) : n.attachEvent && n.attachEvent("onunload", oe)),
                    (d.attributes = ce(function (e) {
                        return (e.className = "i"), !e.getAttribute("className");
                    })),
                    (d.getElementsByTagName = ce(function (e) {
                        return e.appendChild(C.createComment("")), !e.getElementsByTagName("*").length;
                    })),
                    (d.getElementsByClassName = K.test(C.getElementsByClassName)),
                    (d.getById = ce(function (e) {
                        return (a.appendChild(e).id = k), !C.getElementsByName || !C.getElementsByName(k).length;
                    })),
                    d.getById
                        ? ((b.filter.ID = function (e) {
                              var t = e.replace(te, ne);
                              return function (e) {
                                  return e.getAttribute("id") === t;
                              };
                          }),
                          (b.find.ID = function (e, t) {
                              if ("undefined" != typeof t.getElementById && E) {
                                  var n = t.getElementById(e);
                                  return n ? [n] : [];
                              }
                          }))
                        : ((b.filter.ID = function (e) {
                              var n = e.replace(te, ne);
                              return function (e) {
                                  var t = "undefined" != typeof e.getAttributeNode && e.getAttributeNode("id");
                                  return t && t.value === n;
                              };
                          }),
                          (b.find.ID = function (e, t) {
                              if ("undefined" != typeof t.getElementById && E) {
                                  var n,
                                      r,
                                      i,
                                      o = t.getElementById(e);
                                  if (o) {
                                      if ((n = o.getAttributeNode("id")) && n.value === e) return [o];
                                      (i = t.getElementsByName(e)), (r = 0);
                                      while ((o = i[r++])) if ((n = o.getAttributeNode("id")) && n.value === e) return [o];
                                  }
                                  return [];
                              }
                          })),
                    (b.find.TAG = d.getElementsByTagName
                        ? function (e, t) {
                              return "undefined" != typeof t.getElementsByTagName ? t.getElementsByTagName(e) : d.qsa ? t.querySelectorAll(e) : void 0;
                          }
                        : function (e, t) {
                              var n,
                                  r = [],
                                  i = 0,
                                  o = t.getElementsByTagName(e);
                              if ("*" === e) {
                                  while ((n = o[i++])) 1 === n.nodeType && r.push(n);
                                  return r;
                              }
                              return o;
                          }),
                    (b.find.CLASS =
                        d.getElementsByClassName &&
                        function (e, t) {
                            if ("undefined" != typeof t.getElementsByClassName && E) return t.getElementsByClassName(e);
                        }),
                    (s = []),
                    (v = []),
                    (d.qsa = K.test(C.querySelectorAll)) &&
                        (ce(function (e) {
                            (a.appendChild(e).innerHTML = "<a id='" + k + "'></a><select id='" + k + "-\r\\' msallowcapture=''><option selected=''></option></select>"),
                                e.querySelectorAll("[msallowcapture^='']").length && v.push("[*^$]=" + M + "*(?:''|\"\")"),
                                e.querySelectorAll("[selected]").length || v.push("\\[" + M + "*(?:value|" + R + ")"),
                                e.querySelectorAll("[id~=" + k + "-]").length || v.push("~="),
                                e.querySelectorAll(":checked").length || v.push(":checked"),
                                e.querySelectorAll("a#" + k + "+*").length || v.push(".#.+[+~]");
                        }),
                        ce(function (e) {
                            e.innerHTML = "<a href='' disabled='disabled'></a><select disabled='disabled'><option/></select>";
                            var t = C.createElement("input");
                            t.setAttribute("type", "hidden"),
                                e.appendChild(t).setAttribute("name", "D"),
                                e.querySelectorAll("[name=d]").length && v.push("name" + M + "*[*^$|!~]?="),
                                2 !== e.querySelectorAll(":enabled").length && v.push(":enabled", ":disabled"),
                                (a.appendChild(e).disabled = !0),
                                2 !== e.querySelectorAll(":disabled").length && v.push(":enabled", ":disabled"),
                                e.querySelectorAll("*,:x"),
                                v.push(",.*:");
                        })),
                    (d.matchesSelector = K.test((c = a.matches || a.webkitMatchesSelector || a.mozMatchesSelector || a.oMatchesSelector || a.msMatchesSelector))) &&
                        ce(function (e) {
                            (d.disconnectedMatch = c.call(e, "*")), c.call(e, "[s!='']:x"), s.push("!=", $);
                        }),
                    (v = v.length && new RegExp(v.join("|"))),
                    (s = s.length && new RegExp(s.join("|"))),
                    (t = K.test(a.compareDocumentPosition)),
                    (y =
                        t || K.test(a.contains)
                            ? function (e, t) {
                                  var n = 9 === e.nodeType ? e.documentElement : e,
                                      r = t && t.parentNode;
                                  return e === r || !(!r || 1 !== r.nodeType || !(n.contains ? n.contains(r) : e.compareDocumentPosition && 16 & e.compareDocumentPosition(r)));
                              }
                            : function (e, t) {
                                  if (t) while ((t = t.parentNode)) if (t === e) return !0;
                                  return !1;
                              }),
                    (D = t
                        ? function (e, t) {
                              if (e === t) return (l = !0), 0;
                              var n = !e.compareDocumentPosition - !t.compareDocumentPosition;
                              return (
                                  n ||
                                  (1 & (n = (e.ownerDocument || e) === (t.ownerDocument || t) ? e.compareDocumentPosition(t) : 1) || (!d.sortDetached && t.compareDocumentPosition(e) === n)
                                      ? e === C || (e.ownerDocument === m && y(m, e))
                                          ? -1
                                          : t === C || (t.ownerDocument === m && y(m, t))
                                          ? 1
                                          : u
                                          ? P(u, e) - P(u, t)
                                          : 0
                                      : 4 & n
                                      ? -1
                                      : 1)
                              );
                          }
                        : function (e, t) {
                              if (e === t) return (l = !0), 0;
                              var n,
                                  r = 0,
                                  i = e.parentNode,
                                  o = t.parentNode,
                                  a = [e],
                                  s = [t];
                              if (!i || !o) return e === C ? -1 : t === C ? 1 : i ? -1 : o ? 1 : u ? P(u, e) - P(u, t) : 0;
                              if (i === o) return pe(e, t);
                              n = e;
                              while ((n = n.parentNode)) a.unshift(n);
                              n = t;
                              while ((n = n.parentNode)) s.unshift(n);
                              while (a[r] === s[r]) r++;
                              return r ? pe(a[r], s[r]) : a[r] === m ? -1 : s[r] === m ? 1 : 0;
                          })),
                C
            );
        }),
        (se.matches = function (e, t) {
            return se(e, null, null, t);
        }),
        (se.matchesSelector = function (e, t) {
            if (((e.ownerDocument || e) !== C && T(e), d.matchesSelector && E && !A[t + " "] && (!s || !s.test(t)) && (!v || !v.test(t))))
                try {
                    var n = c.call(e, t);
                    if (n || d.disconnectedMatch || (e.document && 11 !== e.document.nodeType)) return n;
                } catch (e) {
                    A(t, !0);
                }
            return 0 < se(t, C, null, [e]).length;
        }),
        (se.contains = function (e, t) {
            return (e.ownerDocument || e) !== C && T(e), y(e, t);
        }),
        (se.attr = function (e, t) {
            (e.ownerDocument || e) !== C && T(e);
            var n = b.attrHandle[t.toLowerCase()],
                r = n && j.call(b.attrHandle, t.toLowerCase()) ? n(e, t, !E) : void 0;
            return void 0 !== r ? r : d.attributes || !E ? e.getAttribute(t) : (r = e.getAttributeNode(t)) && r.specified ? r.value : null;
        }),
        (se.escape = function (e) {
            return (e + "").replace(re, ie);
        }),
        (se.error = function (e) {
            throw new Error("Syntax error, unrecognized expression: " + e);
        }),
        (se.uniqueSort = function (e) {
            var t,
                n = [],
                r = 0,
                i = 0;
            if (((l = !d.detectDuplicates), (u = !d.sortStable && e.slice(0)), e.sort(D), l)) {
                while ((t = e[i++])) t === e[i] && (r = n.push(i));
                while (r--) e.splice(n[r], 1);
            }
            return (u = null), e;
        }),
        (o = se.getText = function (e) {
            var t,
                n = "",
                r = 0,
                i = e.nodeType;
            if (i) {
                if (1 === i || 9 === i || 11 === i) {
                    if ("string" == typeof e.textContent) return e.textContent;
                    for (e = e.firstChild; e; e = e.nextSibling) n += o(e);
                } else if (3 === i || 4 === i) return e.nodeValue;
            } else while ((t = e[r++])) n += o(t);
            return n;
        }),
        ((b = se.selectors = {
            cacheLength: 50,
            createPseudo: le,
            match: G,
            attrHandle: {},
            find: {},
            relative: { ">": { dir: "parentNode", first: !0 }, " ": { dir: "parentNode" }, "+": { dir: "previousSibling", first: !0 }, "~": { dir: "previousSibling" } },
            preFilter: {
                ATTR: function (e) {
                    return (e[1] = e[1].replace(te, ne)), (e[3] = (e[3] || e[4] || e[5] || "").replace(te, ne)), "~=" === e[2] && (e[3] = " " + e[3] + " "), e.slice(0, 4);
                },
                CHILD: function (e) {
                    return (
                        (e[1] = e[1].toLowerCase()),
                        "nth" === e[1].slice(0, 3) ? (e[3] || se.error(e[0]), (e[4] = +(e[4] ? e[5] + (e[6] || 1) : 2 * ("even" === e[3] || "odd" === e[3]))), (e[5] = +(e[7] + e[8] || "odd" === e[3]))) : e[3] && se.error(e[0]),
                        e
                    );
                },
                PSEUDO: function (e) {
                    var t,
                        n = !e[6] && e[2];
                    return G.CHILD.test(e[0])
                        ? null
                        : (e[3] ? (e[2] = e[4] || e[5] || "") : n && X.test(n) && (t = h(n, !0)) && (t = n.indexOf(")", n.length - t) - n.length) && ((e[0] = e[0].slice(0, t)), (e[2] = n.slice(0, t))), e.slice(0, 3));
                },
            },
            filter: {
                TAG: function (e) {
                    var t = e.replace(te, ne).toLowerCase();
                    return "*" === e
                        ? function () {
                              return !0;
                          }
                        : function (e) {
                              return e.nodeName && e.nodeName.toLowerCase() === t;
                          };
                },
                CLASS: function (e) {
                    var t = p[e + " "];
                    return (
                        t ||
                        ((t = new RegExp("(^|" + M + ")" + e + "(" + M + "|$)")) &&
                            p(e, function (e) {
                                return t.test(("string" == typeof e.className && e.className) || ("undefined" != typeof e.getAttribute && e.getAttribute("class")) || "");
                            }))
                    );
                },
                ATTR: function (n, r, i) {
                    return function (e) {
                        var t = se.attr(e, n);
                        return null == t
                            ? "!=" === r
                            : !r ||
                                  ((t += ""),
                                  "=" === r
                                      ? t === i
                                      : "!=" === r
                                      ? t !== i
                                      : "^=" === r
                                      ? i && 0 === t.indexOf(i)
                                      : "*=" === r
                                      ? i && -1 < t.indexOf(i)
                                      : "$=" === r
                                      ? i && t.slice(-i.length) === i
                                      : "~=" === r
                                      ? -1 < (" " + t.replace(F, " ") + " ").indexOf(i)
                                      : "|=" === r && (t === i || t.slice(0, i.length + 1) === i + "-"));
                    };
                },
                CHILD: function (h, e, t, g, v) {
                    var y = "nth" !== h.slice(0, 3),
                        m = "last" !== h.slice(-4),
                        x = "of-type" === e;
                    return 1 === g && 0 === v
                        ? function (e) {
                              return !!e.parentNode;
                          }
                        : function (e, t, n) {
                              var r,
                                  i,
                                  o,
                                  a,
                                  s,
                                  u,
                                  l = y !== m ? "nextSibling" : "previousSibling",
                                  c = e.parentNode,
                                  f = x && e.nodeName.toLowerCase(),
                                  p = !n && !x,
                                  d = !1;
                              if (c) {
                                  if (y) {
                                      while (l) {
                                          a = e;
                                          while ((a = a[l])) if (x ? a.nodeName.toLowerCase() === f : 1 === a.nodeType) return !1;
                                          u = l = "only" === h && !u && "nextSibling";
                                      }
                                      return !0;
                                  }
                                  if (((u = [m ? c.firstChild : c.lastChild]), m && p)) {
                                      (d = (s = (r = (i = (o = (a = c)[k] || (a[k] = {}))[a.uniqueID] || (o[a.uniqueID] = {}))[h] || [])[0] === S && r[1]) && r[2]), (a = s && c.childNodes[s]);
                                      while ((a = (++s && a && a[l]) || (d = s = 0) || u.pop()))
                                          if (1 === a.nodeType && ++d && a === e) {
                                              i[h] = [S, s, d];
                                              break;
                                          }
                                  } else if ((p && (d = s = (r = (i = (o = (a = e)[k] || (a[k] = {}))[a.uniqueID] || (o[a.uniqueID] = {}))[h] || [])[0] === S && r[1]), !1 === d))
                                      while ((a = (++s && a && a[l]) || (d = s = 0) || u.pop()))
                                          if ((x ? a.nodeName.toLowerCase() === f : 1 === a.nodeType) && ++d && (p && ((i = (o = a[k] || (a[k] = {}))[a.uniqueID] || (o[a.uniqueID] = {}))[h] = [S, d]), a === e)) break;
                                  return (d -= v) === g || (d % g == 0 && 0 <= d / g);
                              }
                          };
                },
                PSEUDO: function (e, o) {
                    var t,
                        a = b.pseudos[e] || b.setFilters[e.toLowerCase()] || se.error("unsupported pseudo: " + e);
                    return a[k]
                        ? a(o)
                        : 1 < a.length
                        ? ((t = [e, e, "", o]),
                          b.setFilters.hasOwnProperty(e.toLowerCase())
                              ? le(function (e, t) {
                                    var n,
                                        r = a(e, o),
                                        i = r.length;
                                    while (i--) e[(n = P(e, r[i]))] = !(t[n] = r[i]);
                                })
                              : function (e) {
                                    return a(e, 0, t);
                                })
                        : a;
                },
            },
            pseudos: {
                not: le(function (e) {
                    var r = [],
                        i = [],
                        s = f(e.replace(B, "$1"));
                    return s[k]
                        ? le(function (e, t, n, r) {
                              var i,
                                  o = s(e, null, r, []),
                                  a = e.length;
                              while (a--) (i = o[a]) && (e[a] = !(t[a] = i));
                          })
                        : function (e, t, n) {
                              return (r[0] = e), s(r, null, n, i), (r[0] = null), !i.pop();
                          };
                }),
                has: le(function (t) {
                    return function (e) {
                        return 0 < se(t, e).length;
                    };
                }),
                contains: le(function (t) {
                    return (
                        (t = t.replace(te, ne)),
                        function (e) {
                            return -1 < (e.textContent || o(e)).indexOf(t);
                        }
                    );
                }),
                lang: le(function (n) {
                    return (
                        V.test(n || "") || se.error("unsupported lang: " + n),
                        (n = n.replace(te, ne).toLowerCase()),
                        function (e) {
                            var t;
                            do {
                                if ((t = E ? e.lang : e.getAttribute("xml:lang") || e.getAttribute("lang"))) return (t = t.toLowerCase()) === n || 0 === t.indexOf(n + "-");
                            } while ((e = e.parentNode) && 1 === e.nodeType);
                            return !1;
                        }
                    );
                }),
                target: function (e) {
                    var t = n.location && n.location.hash;
                    return t && t.slice(1) === e.id;
                },
                root: function (e) {
                    return e === a;
                },
                focus: function (e) {
                    return e === C.activeElement && (!C.hasFocus || C.hasFocus()) && !!(e.type || e.href || ~e.tabIndex);
                },
                enabled: ge(!1),
                disabled: ge(!0),
                checked: function (e) {
                    var t = e.nodeName.toLowerCase();
                    return ("input" === t && !!e.checked) || ("option" === t && !!e.selected);
                },
                selected: function (e) {
                    return e.parentNode && e.parentNode.selectedIndex, !0 === e.selected;
                },
                empty: function (e) {
                    for (e = e.firstChild; e; e = e.nextSibling) if (e.nodeType < 6) return !1;
                    return !0;
                },
                parent: function (e) {
                    return !b.pseudos.empty(e);
                },
                header: function (e) {
                    return J.test(e.nodeName);
                },
                input: function (e) {
                    return Q.test(e.nodeName);
                },
                button: function (e) {
                    var t = e.nodeName.toLowerCase();
                    return ("input" === t && "button" === e.type) || "button" === t;
                },
                text: function (e) {
                    var t;
                    return "input" === e.nodeName.toLowerCase() && "text" === e.type && (null == (t = e.getAttribute("type")) || "text" === t.toLowerCase());
                },
                first: ve(function () {
                    return [0];
                }),
                last: ve(function (e, t) {
                    return [t - 1];
                }),
                eq: ve(function (e, t, n) {
                    return [n < 0 ? n + t : n];
                }),
                even: ve(function (e, t) {
                    for (var n = 0; n < t; n += 2) e.push(n);
                    return e;
                }),
                odd: ve(function (e, t) {
                    for (var n = 1; n < t; n += 2) e.push(n);
                    return e;
                }),
                lt: ve(function (e, t, n) {
                    for (var r = n < 0 ? n + t : t < n ? t : n; 0 <= --r; ) e.push(r);
                    return e;
                }),
                gt: ve(function (e, t, n) {
                    for (var r = n < 0 ? n + t : n; ++r < t; ) e.push(r);
                    return e;
                }),
            },
        }).pseudos.nth = b.pseudos.eq),
        { radio: !0, checkbox: !0, file: !0, password: !0, image: !0 }))
            b.pseudos[e] = de(e);
        for (e in { submit: !0, reset: !0 }) b.pseudos[e] = he(e);
        function me() {}
        function xe(e) {
            for (var t = 0, n = e.length, r = ""; t < n; t++) r += e[t].value;
            return r;
        }
        function be(s, e, t) {
            var u = e.dir,
                l = e.next,
                c = l || u,
                f = t && "parentNode" === c,
                p = r++;
            return e.first
                ? function (e, t, n) {
                      while ((e = e[u])) if (1 === e.nodeType || f) return s(e, t, n);
                      return !1;
                  }
                : function (e, t, n) {
                      var r,
                          i,
                          o,
                          a = [S, p];
                      if (n) {
                          while ((e = e[u])) if ((1 === e.nodeType || f) && s(e, t, n)) return !0;
                      } else
                          while ((e = e[u]))
                              if (1 === e.nodeType || f)
                                  if (((i = (o = e[k] || (e[k] = {}))[e.uniqueID] || (o[e.uniqueID] = {})), l && l === e.nodeName.toLowerCase())) e = e[u] || e;
                                  else {
                                      if ((r = i[c]) && r[0] === S && r[1] === p) return (a[2] = r[2]);
                                      if (((i[c] = a)[2] = s(e, t, n))) return !0;
                                  }
                      return !1;
                  };
        }
        function we(i) {
            return 1 < i.length
                ? function (e, t, n) {
                      var r = i.length;
                      while (r--) if (!i[r](e, t, n)) return !1;
                      return !0;
                  }
                : i[0];
        }
        function Te(e, t, n, r, i) {
            for (var o, a = [], s = 0, u = e.length, l = null != t; s < u; s++) (o = e[s]) && ((n && !n(o, r, i)) || (a.push(o), l && t.push(s)));
            return a;
        }
        function Ce(d, h, g, v, y, e) {
            return (
                v && !v[k] && (v = Ce(v)),
                y && !y[k] && (y = Ce(y, e)),
                le(function (e, t, n, r) {
                    var i,
                        o,
                        a,
                        s = [],
                        u = [],
                        l = t.length,
                        c =
                            e ||
                            (function (e, t, n) {
                                for (var r = 0, i = t.length; r < i; r++) se(e, t[r], n);
                                return n;
                            })(h || "*", n.nodeType ? [n] : n, []),
                        f = !d || (!e && h) ? c : Te(c, s, d, n, r),
                        p = g ? (y || (e ? d : l || v) ? [] : t) : f;
                    if ((g && g(f, p, n, r), v)) {
                        (i = Te(p, u)), v(i, [], n, r), (o = i.length);
                        while (o--) (a = i[o]) && (p[u[o]] = !(f[u[o]] = a));
                    }
                    if (e) {
                        if (y || d) {
                            if (y) {
                                (i = []), (o = p.length);
                                while (o--) (a = p[o]) && i.push((f[o] = a));
                                y(null, (p = []), i, r);
                            }
                            o = p.length;
                            while (o--) (a = p[o]) && -1 < (i = y ? P(e, a) : s[o]) && (e[i] = !(t[i] = a));
                        }
                    } else (p = Te(p === t ? p.splice(l, p.length) : p)), y ? y(null, t, p, r) : H.apply(t, p);
                })
            );
        }
        function Ee(e) {
            for (
                var i,
                    t,
                    n,
                    r = e.length,
                    o = b.relative[e[0].type],
                    a = o || b.relative[" "],
                    s = o ? 1 : 0,
                    u = be(
                        function (e) {
                            return e === i;
                        },
                        a,
                        !0
                    ),
                    l = be(
                        function (e) {
                            return -1 < P(i, e);
                        },
                        a,
                        !0
                    ),
                    c = [
                        function (e, t, n) {
                            var r = (!o && (n || t !== w)) || ((i = t).nodeType ? u(e, t, n) : l(e, t, n));
                            return (i = null), r;
                        },
                    ];
                s < r;
                s++
            )
                if ((t = b.relative[e[s].type])) c = [be(we(c), t)];
                else {
                    if ((t = b.filter[e[s].type].apply(null, e[s].matches))[k]) {
                        for (n = ++s; n < r; n++) if (b.relative[e[n].type]) break;
                        return Ce(1 < s && we(c), 1 < s && xe(e.slice(0, s - 1).concat({ value: " " === e[s - 2].type ? "*" : "" })).replace(B, "$1"), t, s < n && Ee(e.slice(s, n)), n < r && Ee((e = e.slice(n))), n < r && xe(e));
                    }
                    c.push(t);
                }
            return we(c);
        }
        return (
            (me.prototype = b.filters = b.pseudos),
            (b.setFilters = new me()),
            (h = se.tokenize = function (e, t) {
                var n,
                    r,
                    i,
                    o,
                    a,
                    s,
                    u,
                    l = x[e + " "];
                if (l) return t ? 0 : l.slice(0);
                (a = e), (s = []), (u = b.preFilter);
                while (a) {
                    for (o in ((n && !(r = _.exec(a))) || (r && (a = a.slice(r[0].length) || a), s.push((i = []))),
                    (n = !1),
                    (r = z.exec(a)) && ((n = r.shift()), i.push({ value: n, type: r[0].replace(B, " ") }), (a = a.slice(n.length))),
                    b.filter))
                        !(r = G[o].exec(a)) || (u[o] && !(r = u[o](r))) || ((n = r.shift()), i.push({ value: n, type: o, matches: r }), (a = a.slice(n.length)));
                    if (!n) break;
                }
                return t ? a.length : a ? se.error(e) : x(e, s).slice(0);
            }),
            (f = se.compile = function (e, t) {
                var n,
                    v,
                    y,
                    m,
                    x,
                    r,
                    i = [],
                    o = [],
                    a = N[e + " "];
                if (!a) {
                    t || (t = h(e)), (n = t.length);
                    while (n--) (a = Ee(t[n]))[k] ? i.push(a) : o.push(a);
                    (a = N(
                        e,
                        ((v = o),
                        (m = 0 < (y = i).length),
                        (x = 0 < v.length),
                        (r = function (e, t, n, r, i) {
                            var o,
                                a,
                                s,
                                u = 0,
                                l = "0",
                                c = e && [],
                                f = [],
                                p = w,
                                d = e || (x && b.find.TAG("*", i)),
                                h = (S += null == p ? 1 : Math.random() || 0.1),
                                g = d.length;
                            for (i && (w = t === C || t || i); l !== g && null != (o = d[l]); l++) {
                                if (x && o) {
                                    (a = 0), t || o.ownerDocument === C || (T(o), (n = !E));
                                    while ((s = v[a++]))
                                        if (s(o, t || C, n)) {
                                            r.push(o);
                                            break;
                                        }
                                    i && (S = h);
                                }
                                m && ((o = !s && o) && u--, e && c.push(o));
                            }
                            if (((u += l), m && l !== u)) {
                                a = 0;
                                while ((s = y[a++])) s(c, f, t, n);
                                if (e) {
                                    if (0 < u) while (l--) c[l] || f[l] || (f[l] = q.call(r));
                                    f = Te(f);
                                }
                                H.apply(r, f), i && !e && 0 < f.length && 1 < u + y.length && se.uniqueSort(r);
                            }
                            return i && ((S = h), (w = p)), c;
                        }),
                        m ? le(r) : r)
                    )).selector = e;
                }
                return a;
            }),
            (g = se.select = function (e, t, n, r) {
                var i,
                    o,
                    a,
                    s,
                    u,
                    l = "function" == typeof e && e,
                    c = !r && h((e = l.selector || e));
                if (((n = n || []), 1 === c.length)) {
                    if (2 < (o = c[0] = c[0].slice(0)).length && "ID" === (a = o[0]).type && 9 === t.nodeType && E && b.relative[o[1].type]) {
                        if (!(t = (b.find.ID(a.matches[0].replace(te, ne), t) || [])[0])) return n;
                        l && (t = t.parentNode), (e = e.slice(o.shift().value.length));
                    }
                    i = G.needsContext.test(e) ? 0 : o.length;
                    while (i--) {
                        if (((a = o[i]), b.relative[(s = a.type)])) break;
                        if ((u = b.find[s]) && (r = u(a.matches[0].replace(te, ne), (ee.test(o[0].type) && ye(t.parentNode)) || t))) {
                            if ((o.splice(i, 1), !(e = r.length && xe(o)))) return H.apply(n, r), n;
                            break;
                        }
                    }
                }
                return (l || f(e, c))(r, t, !E, n, !t || (ee.test(e) && ye(t.parentNode)) || t), n;
            }),
            (d.sortStable = k.split("").sort(D).join("") === k),
            (d.detectDuplicates = !!l),
            T(),
            (d.sortDetached = ce(function (e) {
                return 1 & e.compareDocumentPosition(C.createElement("fieldset"));
            })),
            ce(function (e) {
                return (e.innerHTML = "<a href='#'></a>"), "#" === e.firstChild.getAttribute("href");
            }) ||
                fe("type|href|height|width", function (e, t, n) {
                    if (!n) return e.getAttribute(t, "type" === t.toLowerCase() ? 1 : 2);
                }),
            (d.attributes &&
                ce(function (e) {
                    return (e.innerHTML = "<input/>"), e.firstChild.setAttribute("value", ""), "" === e.firstChild.getAttribute("value");
                })) ||
                fe("value", function (e, t, n) {
                    if (!n && "input" === e.nodeName.toLowerCase()) return e.defaultValue;
                }),
            ce(function (e) {
                return null == e.getAttribute("disabled");
            }) ||
                fe(R, function (e, t, n) {
                    var r;
                    if (!n) return !0 === e[t] ? t.toLowerCase() : (r = e.getAttributeNode(t)) && r.specified ? r.value : null;
                }),
            se
        );
    })(C);
    (k.find = h), (k.expr = h.selectors), (k.expr[":"] = k.expr.pseudos), (k.uniqueSort = k.unique = h.uniqueSort), (k.text = h.getText), (k.isXMLDoc = h.isXML), (k.contains = h.contains), (k.escapeSelector = h.escape);
    var T = function (e, t, n) {
            var r = [],
                i = void 0 !== n;
            while ((e = e[t]) && 9 !== e.nodeType)
                if (1 === e.nodeType) {
                    if (i && k(e).is(n)) break;
                    r.push(e);
                }
            return r;
        },
        S = function (e, t) {
            for (var n = []; e; e = e.nextSibling) 1 === e.nodeType && e !== t && n.push(e);
            return n;
        },
        N = k.expr.match.needsContext;
    function A(e, t) {
        return e.nodeName && e.nodeName.toLowerCase() === t.toLowerCase();
    }
    var D = /^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i;
    function j(e, n, r) {
        return m(n)
            ? k.grep(e, function (e, t) {
                  return !!n.call(e, t, e) !== r;
              })
            : n.nodeType
            ? k.grep(e, function (e) {
                  return (e === n) !== r;
              })
            : "string" != typeof n
            ? k.grep(e, function (e) {
                  return -1 < i.call(n, e) !== r;
              })
            : k.filter(n, e, r);
    }
    (k.filter = function (e, t, n) {
        var r = t[0];
        return (
            n && (e = ":not(" + e + ")"),
            1 === t.length && 1 === r.nodeType
                ? k.find.matchesSelector(r, e)
                    ? [r]
                    : []
                : k.find.matches(
                      e,
                      k.grep(t, function (e) {
                          return 1 === e.nodeType;
                      })
                  )
        );
    }),
        k.fn.extend({
            find: function (e) {
                var t,
                    n,
                    r = this.length,
                    i = this;
                if ("string" != typeof e)
                    return this.pushStack(
                        k(e).filter(function () {
                            for (t = 0; t < r; t++) if (k.contains(i[t], this)) return !0;
                        })
                    );
                for (n = this.pushStack([]), t = 0; t < r; t++) k.find(e, i[t], n);
                return 1 < r ? k.uniqueSort(n) : n;
            },
            filter: function (e) {
                return this.pushStack(j(this, e || [], !1));
            },
            not: function (e) {
                return this.pushStack(j(this, e || [], !0));
            },
            is: function (e) {
                return !!j(this, "string" == typeof e && N.test(e) ? k(e) : e || [], !1).length;
            },
        });
    var q,
        L = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/;
    ((k.fn.init = function (e, t, n) {
        var r, i;
        if (!e) return this;
        if (((n = n || q), "string" == typeof e)) {
            if (!(r = "<" === e[0] && ">" === e[e.length - 1] && 3 <= e.length ? [null, e, null] : L.exec(e)) || (!r[1] && t)) return !t || t.jquery ? (t || n).find(e) : this.constructor(t).find(e);
            if (r[1]) {
                if (((t = t instanceof k ? t[0] : t), k.merge(this, k.parseHTML(r[1], t && t.nodeType ? t.ownerDocument || t : E, !0)), D.test(r[1]) && k.isPlainObject(t))) for (r in t) m(this[r]) ? this[r](t[r]) : this.attr(r, t[r]);
                return this;
            }
            return (i = E.getElementById(r[2])) && ((this[0] = i), (this.length = 1)), this;
        }
        return e.nodeType ? ((this[0] = e), (this.length = 1), this) : m(e) ? (void 0 !== n.ready ? n.ready(e) : e(k)) : k.makeArray(e, this);
    }).prototype = k.fn),
        (q = k(E));
    var H = /^(?:parents|prev(?:Until|All))/,
        O = { children: !0, contents: !0, next: !0, prev: !0 };
    function P(e, t) {
        while ((e = e[t]) && 1 !== e.nodeType);
        return e;
    }
    k.fn.extend({
        has: function (e) {
            var t = k(e, this),
                n = t.length;
            return this.filter(function () {
                for (var e = 0; e < n; e++) if (k.contains(this, t[e])) return !0;
            });
        },
        closest: function (e, t) {
            var n,
                r = 0,
                i = this.length,
                o = [],
                a = "string" != typeof e && k(e);
            if (!N.test(e))
                for (; r < i; r++)
                    for (n = this[r]; n && n !== t; n = n.parentNode)
                        if (n.nodeType < 11 && (a ? -1 < a.index(n) : 1 === n.nodeType && k.find.matchesSelector(n, e))) {
                            o.push(n);
                            break;
                        }
            return this.pushStack(1 < o.length ? k.uniqueSort(o) : o);
        },
        index: function (e) {
            return e ? ("string" == typeof e ? i.call(k(e), this[0]) : i.call(this, e.jquery ? e[0] : e)) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1;
        },
        add: function (e, t) {
            return this.pushStack(k.uniqueSort(k.merge(this.get(), k(e, t))));
        },
        addBack: function (e) {
            return this.add(null == e ? this.prevObject : this.prevObject.filter(e));
        },
    }),
        k.each(
            {
                parent: function (e) {
                    var t = e.parentNode;
                    return t && 11 !== t.nodeType ? t : null;
                },
                parents: function (e) {
                    return T(e, "parentNode");
                },
                parentsUntil: function (e, t, n) {
                    return T(e, "parentNode", n);
                },
                next: function (e) {
                    return P(e, "nextSibling");
                },
                prev: function (e) {
                    return P(e, "previousSibling");
                },
                nextAll: function (e) {
                    return T(e, "nextSibling");
                },
                prevAll: function (e) {
                    return T(e, "previousSibling");
                },
                nextUntil: function (e, t, n) {
                    return T(e, "nextSibling", n);
                },
                prevUntil: function (e, t, n) {
                    return T(e, "previousSibling", n);
                },
                siblings: function (e) {
                    return S((e.parentNode || {}).firstChild, e);
                },
                children: function (e) {
                    return S(e.firstChild);
                },
                contents: function (e) {
                    return "undefined" != typeof e.contentDocument ? e.contentDocument : (A(e, "template") && (e = e.content || e), k.merge([], e.childNodes));
                },
            },
            function (r, i) {
                k.fn[r] = function (e, t) {
                    var n = k.map(this, i, e);
                    return "Until" !== r.slice(-5) && (t = e), t && "string" == typeof t && (n = k.filter(t, n)), 1 < this.length && (O[r] || k.uniqueSort(n), H.test(r) && n.reverse()), this.pushStack(n);
                };
            }
        );
    var R = /[^\x20\t\r\n\f]+/g;
    function M(e) {
        return e;
    }
    function I(e) {
        throw e;
    }
    function W(e, t, n, r) {
        var i;
        try {
            e && m((i = e.promise)) ? i.call(e).done(t).fail(n) : e && m((i = e.then)) ? i.call(e, t, n) : t.apply(void 0, [e].slice(r));
        } catch (e) {
            n.apply(void 0, [e]);
        }
    }
    (k.Callbacks = function (r) {
        var e, n;
        r =
            "string" == typeof r
                ? ((e = r),
                  (n = {}),
                  k.each(e.match(R) || [], function (e, t) {
                      n[t] = !0;
                  }),
                  n)
                : k.extend({}, r);
        var i,
            t,
            o,
            a,
            s = [],
            u = [],
            l = -1,
            c = function () {
                for (a = a || r.once, o = i = !0; u.length; l = -1) {
                    t = u.shift();
                    while (++l < s.length) !1 === s[l].apply(t[0], t[1]) && r.stopOnFalse && ((l = s.length), (t = !1));
                }
                r.memory || (t = !1), (i = !1), a && (s = t ? [] : "");
            },
            f = {
                add: function () {
                    return (
                        s &&
                            (t && !i && ((l = s.length - 1), u.push(t)),
                            (function n(e) {
                                k.each(e, function (e, t) {
                                    m(t) ? (r.unique && f.has(t)) || s.push(t) : t && t.length && "string" !== w(t) && n(t);
                                });
                            })(arguments),
                            t && !i && c()),
                        this
                    );
                },
                remove: function () {
                    return (
                        k.each(arguments, function (e, t) {
                            var n;
                            while (-1 < (n = k.inArray(t, s, n))) s.splice(n, 1), n <= l && l--;
                        }),
                        this
                    );
                },
                has: function (e) {
                    return e ? -1 < k.inArray(e, s) : 0 < s.length;
                },
                empty: function () {
                    return s && (s = []), this;
                },
                disable: function () {
                    return (a = u = []), (s = t = ""), this;
                },
                disabled: function () {
                    return !s;
                },
                lock: function () {
                    return (a = u = []), t || i || (s = t = ""), this;
                },
                locked: function () {
                    return !!a;
                },
                fireWith: function (e, t) {
                    return a || ((t = [e, (t = t || []).slice ? t.slice() : t]), u.push(t), i || c()), this;
                },
                fire: function () {
                    return f.fireWith(this, arguments), this;
                },
                fired: function () {
                    return !!o;
                },
            };
        return f;
    }),
        k.extend({
            Deferred: function (e) {
                var o = [
                        ["notify", "progress", k.Callbacks("memory"), k.Callbacks("memory"), 2],
                        ["resolve", "done", k.Callbacks("once memory"), k.Callbacks("once memory"), 0, "resolved"],
                        ["reject", "fail", k.Callbacks("once memory"), k.Callbacks("once memory"), 1, "rejected"],
                    ],
                    i = "pending",
                    a = {
                        state: function () {
                            return i;
                        },
                        always: function () {
                            return s.done(arguments).fail(arguments), this;
                        },
                        catch: function (e) {
                            return a.then(null, e);
                        },
                        pipe: function () {
                            var i = arguments;
                            return k
                                .Deferred(function (r) {
                                    k.each(o, function (e, t) {
                                        var n = m(i[t[4]]) && i[t[4]];
                                        s[t[1]](function () {
                                            var e = n && n.apply(this, arguments);
                                            e && m(e.promise) ? e.promise().progress(r.notify).done(r.resolve).fail(r.reject) : r[t[0] + "With"](this, n ? [e] : arguments);
                                        });
                                    }),
                                        (i = null);
                                })
                                .promise();
                        },
                        then: function (t, n, r) {
                            var u = 0;
                            function l(i, o, a, s) {
                                return function () {
                                    var n = this,
                                        r = arguments,
                                        e = function () {
                                            var e, t;
                                            if (!(i < u)) {
                                                if ((e = a.apply(n, r)) === o.promise()) throw new TypeError("Thenable self-resolution");
                                                (t = e && ("object" == typeof e || "function" == typeof e) && e.then),
                                                    m(t)
                                                        ? s
                                                            ? t.call(e, l(u, o, M, s), l(u, o, I, s))
                                                            : (u++, t.call(e, l(u, o, M, s), l(u, o, I, s), l(u, o, M, o.notifyWith)))
                                                        : (a !== M && ((n = void 0), (r = [e])), (s || o.resolveWith)(n, r));
                                            }
                                        },
                                        t = s
                                            ? e
                                            : function () {
                                                  try {
                                                      e();
                                                  } catch (e) {
                                                      k.Deferred.exceptionHook && k.Deferred.exceptionHook(e, t.stackTrace), u <= i + 1 && (a !== I && ((n = void 0), (r = [e])), o.rejectWith(n, r));
                                                  }
                                              };
                                    i ? t() : (k.Deferred.getStackHook && (t.stackTrace = k.Deferred.getStackHook()), C.setTimeout(t));
                                };
                            }
                            return k
                                .Deferred(function (e) {
                                    o[0][3].add(l(0, e, m(r) ? r : M, e.notifyWith)), o[1][3].add(l(0, e, m(t) ? t : M)), o[2][3].add(l(0, e, m(n) ? n : I));
                                })
                                .promise();
                        },
                        promise: function (e) {
                            return null != e ? k.extend(e, a) : a;
                        },
                    },
                    s = {};
                return (
                    k.each(o, function (e, t) {
                        var n = t[2],
                            r = t[5];
                        (a[t[1]] = n.add),
                            r &&
                                n.add(
                                    function () {
                                        i = r;
                                    },
                                    o[3 - e][2].disable,
                                    o[3 - e][3].disable,
                                    o[0][2].lock,
                                    o[0][3].lock
                                ),
                            n.add(t[3].fire),
                            (s[t[0]] = function () {
                                return s[t[0] + "With"](this === s ? void 0 : this, arguments), this;
                            }),
                            (s[t[0] + "With"] = n.fireWith);
                    }),
                    a.promise(s),
                    e && e.call(s, s),
                    s
                );
            },
            when: function (e) {
                var n = arguments.length,
                    t = n,
                    r = Array(t),
                    i = s.call(arguments),
                    o = k.Deferred(),
                    a = function (t) {
                        return function (e) {
                            (r[t] = this), (i[t] = 1 < arguments.length ? s.call(arguments) : e), --n || o.resolveWith(r, i);
                        };
                    };
                if (n <= 1 && (W(e, o.done(a(t)).resolve, o.reject, !n), "pending" === o.state() || m(i[t] && i[t].then))) return o.then();
                while (t--) W(i[t], a(t), o.reject);
                return o.promise();
            },
        });
    var $ = /^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/;
    (k.Deferred.exceptionHook = function (e, t) {
        C.console && C.console.warn && e && $.test(e.name) && C.console.warn("jQuery.Deferred exception: " + e.message, e.stack, t);
    }),
        (k.readyException = function (e) {
            C.setTimeout(function () {
                throw e;
            });
        });
    var F = k.Deferred();
    function B() {
        E.removeEventListener("DOMContentLoaded", B), C.removeEventListener("load", B), k.ready();
    }
    (k.fn.ready = function (e) {
        return (
            F.then(e)["catch"](function (e) {
                k.readyException(e);
            }),
            this
        );
    }),
        k.extend({
            isReady: !1,
            readyWait: 1,
            ready: function (e) {
                (!0 === e ? --k.readyWait : k.isReady) || ((k.isReady = !0) !== e && 0 < --k.readyWait) || F.resolveWith(E, [k]);
            },
        }),
        (k.ready.then = F.then),
        "complete" === E.readyState || ("loading" !== E.readyState && !E.documentElement.doScroll) ? C.setTimeout(k.ready) : (E.addEventListener("DOMContentLoaded", B), C.addEventListener("load", B));
    var _ = function (e, t, n, r, i, o, a) {
            var s = 0,
                u = e.length,
                l = null == n;
            if ("object" === w(n)) for (s in ((i = !0), n)) _(e, t, s, n[s], !0, o, a);
            else if (
                void 0 !== r &&
                ((i = !0),
                m(r) || (a = !0),
                l &&
                    (a
                        ? (t.call(e, r), (t = null))
                        : ((l = t),
                          (t = function (e, t, n) {
                              return l.call(k(e), n);
                          }))),
                t)
            )
                for (; s < u; s++) t(e[s], n, a ? r : r.call(e[s], s, t(e[s], n)));
            return i ? e : l ? t.call(e) : u ? t(e[0], n) : o;
        },
        z = /^-ms-/,
        U = /-([a-z])/g;
    function X(e, t) {
        return t.toUpperCase();
    }
    function V(e) {
        return e.replace(z, "ms-").replace(U, X);
    }
    var G = function (e) {
        return 1 === e.nodeType || 9 === e.nodeType || !+e.nodeType;
    };
    function Y() {
        this.expando = k.expando + Y.uid++;
    }
    (Y.uid = 1),
        (Y.prototype = {
            cache: function (e) {
                var t = e[this.expando];
                return t || ((t = {}), G(e) && (e.nodeType ? (e[this.expando] = t) : Object.defineProperty(e, this.expando, { value: t, configurable: !0 }))), t;
            },
            set: function (e, t, n) {
                var r,
                    i = this.cache(e);
                if ("string" == typeof t) i[V(t)] = n;
                else for (r in t) i[V(r)] = t[r];
                return i;
            },
            get: function (e, t) {
                return void 0 === t ? this.cache(e) : e[this.expando] && e[this.expando][V(t)];
            },
            access: function (e, t, n) {
                return void 0 === t || (t && "string" == typeof t && void 0 === n) ? this.get(e, t) : (this.set(e, t, n), void 0 !== n ? n : t);
            },
            remove: function (e, t) {
                var n,
                    r = e[this.expando];
                if (void 0 !== r) {
                    if (void 0 !== t) {
                        n = (t = Array.isArray(t) ? t.map(V) : (t = V(t)) in r ? [t] : t.match(R) || []).length;
                        while (n--) delete r[t[n]];
                    }
                    (void 0 === t || k.isEmptyObject(r)) && (e.nodeType ? (e[this.expando] = void 0) : delete e[this.expando]);
                }
            },
            hasData: function (e) {
                var t = e[this.expando];
                return void 0 !== t && !k.isEmptyObject(t);
            },
        });
    var Q = new Y(),
        J = new Y(),
        K = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,
        Z = /[A-Z]/g;
    function ee(e, t, n) {
        var r, i;
        if (void 0 === n && 1 === e.nodeType)
            if (((r = "data-" + t.replace(Z, "-$&").toLowerCase()), "string" == typeof (n = e.getAttribute(r)))) {
                try {
                    n = "true" === (i = n) || ("false" !== i && ("null" === i ? null : i === +i + "" ? +i : K.test(i) ? JSON.parse(i) : i));
                } catch (e) {}
                J.set(e, t, n);
            } else n = void 0;
        return n;
    }
    k.extend({
        hasData: function (e) {
            return J.hasData(e) || Q.hasData(e);
        },
        data: function (e, t, n) {
            return J.access(e, t, n);
        },
        removeData: function (e, t) {
            J.remove(e, t);
        },
        _data: function (e, t, n) {
            return Q.access(e, t, n);
        },
        _removeData: function (e, t) {
            Q.remove(e, t);
        },
    }),
        k.fn.extend({
            data: function (n, e) {
                var t,
                    r,
                    i,
                    o = this[0],
                    a = o && o.attributes;
                if (void 0 === n) {
                    if (this.length && ((i = J.get(o)), 1 === o.nodeType && !Q.get(o, "hasDataAttrs"))) {
                        t = a.length;
                        while (t--) a[t] && 0 === (r = a[t].name).indexOf("data-") && ((r = V(r.slice(5))), ee(o, r, i[r]));
                        Q.set(o, "hasDataAttrs", !0);
                    }
                    return i;
                }
                return "object" == typeof n
                    ? this.each(function () {
                          J.set(this, n);
                      })
                    : _(
                          this,
                          function (e) {
                              var t;
                              if (o && void 0 === e) return void 0 !== (t = J.get(o, n)) ? t : void 0 !== (t = ee(o, n)) ? t : void 0;
                              this.each(function () {
                                  J.set(this, n, e);
                              });
                          },
                          null,
                          e,
                          1 < arguments.length,
                          null,
                          !0
                      );
            },
            removeData: function (e) {
                return this.each(function () {
                    J.remove(this, e);
                });
            },
        }),
        k.extend({
            queue: function (e, t, n) {
                var r;
                if (e) return (t = (t || "fx") + "queue"), (r = Q.get(e, t)), n && (!r || Array.isArray(n) ? (r = Q.access(e, t, k.makeArray(n))) : r.push(n)), r || [];
            },
            dequeue: function (e, t) {
                t = t || "fx";
                var n = k.queue(e, t),
                    r = n.length,
                    i = n.shift(),
                    o = k._queueHooks(e, t);
                "inprogress" === i && ((i = n.shift()), r--),
                    i &&
                        ("fx" === t && n.unshift("inprogress"),
                        delete o.stop,
                        i.call(
                            e,
                            function () {
                                k.dequeue(e, t);
                            },
                            o
                        )),
                    !r && o && o.empty.fire();
            },
            _queueHooks: function (e, t) {
                var n = t + "queueHooks";
                return (
                    Q.get(e, n) ||
                    Q.access(e, n, {
                        empty: k.Callbacks("once memory").add(function () {
                            Q.remove(e, [t + "queue", n]);
                        }),
                    })
                );
            },
        }),
        k.fn.extend({
            queue: function (t, n) {
                var e = 2;
                return (
                    "string" != typeof t && ((n = t), (t = "fx"), e--),
                    arguments.length < e
                        ? k.queue(this[0], t)
                        : void 0 === n
                        ? this
                        : this.each(function () {
                              var e = k.queue(this, t, n);
                              k._queueHooks(this, t), "fx" === t && "inprogress" !== e[0] && k.dequeue(this, t);
                          })
                );
            },
            dequeue: function (e) {
                return this.each(function () {
                    k.dequeue(this, e);
                });
            },
            clearQueue: function (e) {
                return this.queue(e || "fx", []);
            },
            promise: function (e, t) {
                var n,
                    r = 1,
                    i = k.Deferred(),
                    o = this,
                    a = this.length,
                    s = function () {
                        --r || i.resolveWith(o, [o]);
                    };
                "string" != typeof e && ((t = e), (e = void 0)), (e = e || "fx");
                while (a--) (n = Q.get(o[a], e + "queueHooks")) && n.empty && (r++, n.empty.add(s));
                return s(), i.promise(t);
            },
        });
    var te = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
        ne = new RegExp("^(?:([+-])=|)(" + te + ")([a-z%]*)$", "i"),
        re = ["Top", "Right", "Bottom", "Left"],
        ie = E.documentElement,
        oe = function (e) {
            return k.contains(e.ownerDocument, e);
        },
        ae = { composed: !0 };
    ie.getRootNode &&
        (oe = function (e) {
            return k.contains(e.ownerDocument, e) || e.getRootNode(ae) === e.ownerDocument;
        });
    var se = function (e, t) {
            return "none" === (e = t || e).style.display || ("" === e.style.display && oe(e) && "none" === k.css(e, "display"));
        },
        ue = function (e, t, n, r) {
            var i,
                o,
                a = {};
            for (o in t) (a[o] = e.style[o]), (e.style[o] = t[o]);
            for (o in ((i = n.apply(e, r || [])), t)) e.style[o] = a[o];
            return i;
        };
    function le(e, t, n, r) {
        var i,
            o,
            a = 20,
            s = r
                ? function () {
                      return r.cur();
                  }
                : function () {
                      return k.css(e, t, "");
                  },
            u = s(),
            l = (n && n[3]) || (k.cssNumber[t] ? "" : "px"),
            c = e.nodeType && (k.cssNumber[t] || ("px" !== l && +u)) && ne.exec(k.css(e, t));
        if (c && c[3] !== l) {
            (u /= 2), (l = l || c[3]), (c = +u || 1);
            while (a--) k.style(e, t, c + l), (1 - o) * (1 - (o = s() / u || 0.5)) <= 0 && (a = 0), (c /= o);
            (c *= 2), k.style(e, t, c + l), (n = n || []);
        }
        return n && ((c = +c || +u || 0), (i = n[1] ? c + (n[1] + 1) * n[2] : +n[2]), r && ((r.unit = l), (r.start = c), (r.end = i))), i;
    }
    var ce = {};
    function fe(e, t) {
        for (var n, r, i, o, a, s, u, l = [], c = 0, f = e.length; c < f; c++)
            (r = e[c]).style &&
                ((n = r.style.display),
                t
                    ? ("none" === n && ((l[c] = Q.get(r, "display") || null), l[c] || (r.style.display = "")),
                      "" === r.style.display &&
                          se(r) &&
                          (l[c] =
                              ((u = a = o = void 0),
                              (a = (i = r).ownerDocument),
                              (s = i.nodeName),
                              (u = ce[s]) || ((o = a.body.appendChild(a.createElement(s))), (u = k.css(o, "display")), o.parentNode.removeChild(o), "none" === u && (u = "block"), (ce[s] = u)))))
                    : "none" !== n && ((l[c] = "none"), Q.set(r, "display", n)));
        for (c = 0; c < f; c++) null != l[c] && (e[c].style.display = l[c]);
        return e;
    }
    k.fn.extend({
        show: function () {
            return fe(this, !0);
        },
        hide: function () {
            return fe(this);
        },
        toggle: function (e) {
            return "boolean" == typeof e
                ? e
                    ? this.show()
                    : this.hide()
                : this.each(function () {
                      se(this) ? k(this).show() : k(this).hide();
                  });
        },
    });
    var pe = /^(?:checkbox|radio)$/i,
        de = /<([a-z][^\/\0>\x20\t\r\n\f]*)/i,
        he = /^$|^module$|\/(?:java|ecma)script/i,
        ge = {
            option: [1, "<select multiple='multiple'>", "</select>"],
            thead: [1, "<table>", "</table>"],
            col: [2, "<table><colgroup>", "</colgroup></table>"],
            tr: [2, "<table><tbody>", "</tbody></table>"],
            td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
            _default: [0, "", ""],
        };
    function ve(e, t) {
        var n;
        return (n = "undefined" != typeof e.getElementsByTagName ? e.getElementsByTagName(t || "*") : "undefined" != typeof e.querySelectorAll ? e.querySelectorAll(t || "*") : []), void 0 === t || (t && A(e, t)) ? k.merge([e], n) : n;
    }
    function ye(e, t) {
        for (var n = 0, r = e.length; n < r; n++) Q.set(e[n], "globalEval", !t || Q.get(t[n], "globalEval"));
    }
    (ge.optgroup = ge.option), (ge.tbody = ge.tfoot = ge.colgroup = ge.caption = ge.thead), (ge.th = ge.td);
    var me,
        xe,
        be = /<|&#?\w+;/;
    function we(e, t, n, r, i) {
        for (var o, a, s, u, l, c, f = t.createDocumentFragment(), p = [], d = 0, h = e.length; d < h; d++)
            if ((o = e[d]) || 0 === o)
                if ("object" === w(o)) k.merge(p, o.nodeType ? [o] : o);
                else if (be.test(o)) {
                    (a = a || f.appendChild(t.createElement("div"))), (s = (de.exec(o) || ["", ""])[1].toLowerCase()), (u = ge[s] || ge._default), (a.innerHTML = u[1] + k.htmlPrefilter(o) + u[2]), (c = u[0]);
                    while (c--) a = a.lastChild;
                    k.merge(p, a.childNodes), ((a = f.firstChild).textContent = "");
                } else p.push(t.createTextNode(o));
        (f.textContent = ""), (d = 0);
        while ((o = p[d++]))
            if (r && -1 < k.inArray(o, r)) i && i.push(o);
            else if (((l = oe(o)), (a = ve(f.appendChild(o), "script")), l && ye(a), n)) {
                c = 0;
                while ((o = a[c++])) he.test(o.type || "") && n.push(o);
            }
        return f;
    }
    (me = E.createDocumentFragment().appendChild(E.createElement("div"))),
        (xe = E.createElement("input")).setAttribute("type", "radio"),
        xe.setAttribute("checked", "checked"),
        xe.setAttribute("name", "t"),
        me.appendChild(xe),
        (y.checkClone = me.cloneNode(!0).cloneNode(!0).lastChild.checked),
        (me.innerHTML = "<textarea>x</textarea>"),
        (y.noCloneChecked = !!me.cloneNode(!0).lastChild.defaultValue);
    var Te = /^key/,
        Ce = /^(?:mouse|pointer|contextmenu|drag|drop)|click/,
        Ee = /^([^.]*)(?:\.(.+)|)/;
    function ke() {
        return !0;
    }
    function Se() {
        return !1;
    }
    function Ne(e, t) {
        return (
            (e ===
                (function () {
                    try {
                        return E.activeElement;
                    } catch (e) {}
                })()) ==
            ("focus" === t)
        );
    }
    function Ae(e, t, n, r, i, o) {
        var a, s;
        if ("object" == typeof t) {
            for (s in ("string" != typeof n && ((r = r || n), (n = void 0)), t)) Ae(e, s, n, r, t[s], o);
            return e;
        }
        if ((null == r && null == i ? ((i = n), (r = n = void 0)) : null == i && ("string" == typeof n ? ((i = r), (r = void 0)) : ((i = r), (r = n), (n = void 0))), !1 === i)) i = Se;
        else if (!i) return e;
        return (
            1 === o &&
                ((a = i),
                ((i = function (e) {
                    return k().off(e), a.apply(this, arguments);
                }).guid = a.guid || (a.guid = k.guid++))),
            e.each(function () {
                k.event.add(this, t, i, r, n);
            })
        );
    }
    function De(e, i, o) {
        o
            ? (Q.set(e, i, !1),
              k.event.add(e, i, {
                  namespace: !1,
                  handler: function (e) {
                      var t,
                          n,
                          r = Q.get(this, i);
                      if (1 & e.isTrigger && this[i]) {
                          if (r.length) (k.event.special[i] || {}).delegateType && e.stopPropagation();
                          else if (((r = s.call(arguments)), Q.set(this, i, r), (t = o(this, i)), this[i](), r !== (n = Q.get(this, i)) || t ? Q.set(this, i, !1) : (n = {}), r !== n))
                              return e.stopImmediatePropagation(), e.preventDefault(), n.value;
                      } else r.length && (Q.set(this, i, { value: k.event.trigger(k.extend(r[0], k.Event.prototype), r.slice(1), this) }), e.stopImmediatePropagation());
                  },
              }))
            : void 0 === Q.get(e, i) && k.event.add(e, i, ke);
    }
    (k.event = {
        global: {},
        add: function (t, e, n, r, i) {
            var o,
                a,
                s,
                u,
                l,
                c,
                f,
                p,
                d,
                h,
                g,
                v = Q.get(t);
            if (v) {
                n.handler && ((n = (o = n).handler), (i = o.selector)),
                    i && k.find.matchesSelector(ie, i),
                    n.guid || (n.guid = k.guid++),
                    (u = v.events) || (u = v.events = {}),
                    (a = v.handle) ||
                        (a = v.handle = function (e) {
                            return "undefined" != typeof k && k.event.triggered !== e.type ? k.event.dispatch.apply(t, arguments) : void 0;
                        }),
                    (l = (e = (e || "").match(R) || [""]).length);
                while (l--)
                    (d = g = (s = Ee.exec(e[l]) || [])[1]),
                        (h = (s[2] || "").split(".").sort()),
                        d &&
                            ((f = k.event.special[d] || {}),
                            (d = (i ? f.delegateType : f.bindType) || d),
                            (f = k.event.special[d] || {}),
                            (c = k.extend({ type: d, origType: g, data: r, handler: n, guid: n.guid, selector: i, needsContext: i && k.expr.match.needsContext.test(i), namespace: h.join(".") }, o)),
                            (p = u[d]) || (((p = u[d] = []).delegateCount = 0), (f.setup && !1 !== f.setup.call(t, r, h, a)) || (t.addEventListener && t.addEventListener(d, a))),
                            f.add && (f.add.call(t, c), c.handler.guid || (c.handler.guid = n.guid)),
                            i ? p.splice(p.delegateCount++, 0, c) : p.push(c),
                            (k.event.global[d] = !0));
            }
        },
        remove: function (e, t, n, r, i) {
            var o,
                a,
                s,
                u,
                l,
                c,
                f,
                p,
                d,
                h,
                g,
                v = Q.hasData(e) && Q.get(e);
            if (v && (u = v.events)) {
                l = (t = (t || "").match(R) || [""]).length;
                while (l--)
                    if (((d = g = (s = Ee.exec(t[l]) || [])[1]), (h = (s[2] || "").split(".").sort()), d)) {
                        (f = k.event.special[d] || {}), (p = u[(d = (r ? f.delegateType : f.bindType) || d)] || []), (s = s[2] && new RegExp("(^|\\.)" + h.join("\\.(?:.*\\.|)") + "(\\.|$)")), (a = o = p.length);
                        while (o--)
                            (c = p[o]),
                                (!i && g !== c.origType) ||
                                    (n && n.guid !== c.guid) ||
                                    (s && !s.test(c.namespace)) ||
                                    (r && r !== c.selector && ("**" !== r || !c.selector)) ||
                                    (p.splice(o, 1), c.selector && p.delegateCount--, f.remove && f.remove.call(e, c));
                        a && !p.length && ((f.teardown && !1 !== f.teardown.call(e, h, v.handle)) || k.removeEvent(e, d, v.handle), delete u[d]);
                    } else for (d in u) k.event.remove(e, d + t[l], n, r, !0);
                k.isEmptyObject(u) && Q.remove(e, "handle events");
            }
        },
        dispatch: function (e) {
            var t,
                n,
                r,
                i,
                o,
                a,
                s = k.event.fix(e),
                u = new Array(arguments.length),
                l = (Q.get(this, "events") || {})[s.type] || [],
                c = k.event.special[s.type] || {};
            for (u[0] = s, t = 1; t < arguments.length; t++) u[t] = arguments[t];
            if (((s.delegateTarget = this), !c.preDispatch || !1 !== c.preDispatch.call(this, s))) {
                (a = k.event.handlers.call(this, s, l)), (t = 0);
                while ((i = a[t++]) && !s.isPropagationStopped()) {
                    (s.currentTarget = i.elem), (n = 0);
                    while ((o = i.handlers[n++]) && !s.isImmediatePropagationStopped())
                        (s.rnamespace && !1 !== o.namespace && !s.rnamespace.test(o.namespace)) ||
                            ((s.handleObj = o), (s.data = o.data), void 0 !== (r = ((k.event.special[o.origType] || {}).handle || o.handler).apply(i.elem, u)) && !1 === (s.result = r) && (s.preventDefault(), s.stopPropagation()));
                }
                return c.postDispatch && c.postDispatch.call(this, s), s.result;
            }
        },
        handlers: function (e, t) {
            var n,
                r,
                i,
                o,
                a,
                s = [],
                u = t.delegateCount,
                l = e.target;
            if (u && l.nodeType && !("click" === e.type && 1 <= e.button))
                for (; l !== this; l = l.parentNode || this)
                    if (1 === l.nodeType && ("click" !== e.type || !0 !== l.disabled)) {
                        for (o = [], a = {}, n = 0; n < u; n++) void 0 === a[(i = (r = t[n]).selector + " ")] && (a[i] = r.needsContext ? -1 < k(i, this).index(l) : k.find(i, this, null, [l]).length), a[i] && o.push(r);
                        o.length && s.push({ elem: l, handlers: o });
                    }
            return (l = this), u < t.length && s.push({ elem: l, handlers: t.slice(u) }), s;
        },
        addProp: function (t, e) {
            Object.defineProperty(k.Event.prototype, t, {
                enumerable: !0,
                configurable: !0,
                get: m(e)
                    ? function () {
                          if (this.originalEvent) return e(this.originalEvent);
                      }
                    : function () {
                          if (this.originalEvent) return this.originalEvent[t];
                      },
                set: function (e) {
                    Object.defineProperty(this, t, { enumerable: !0, configurable: !0, writable: !0, value: e });
                },
            });
        },
        fix: function (e) {
            return e[k.expando] ? e : new k.Event(e);
        },
        special: {
            load: { noBubble: !0 },
            click: {
                setup: function (e) {
                    var t = this || e;
                    return pe.test(t.type) && t.click && A(t, "input") && De(t, "click", ke), !1;
                },
                trigger: function (e) {
                    var t = this || e;
                    return pe.test(t.type) && t.click && A(t, "input") && De(t, "click"), !0;
                },
                _default: function (e) {
                    var t = e.target;
                    return (pe.test(t.type) && t.click && A(t, "input") && Q.get(t, "click")) || A(t, "a");
                },
            },
            beforeunload: {
                postDispatch: function (e) {
                    void 0 !== e.result && e.originalEvent && (e.originalEvent.returnValue = e.result);
                },
            },
        },
    }),
        (k.removeEvent = function (e, t, n) {
            e.removeEventListener && e.removeEventListener(t, n);
        }),
        (k.Event = function (e, t) {
            if (!(this instanceof k.Event)) return new k.Event(e, t);
            e && e.type
                ? ((this.originalEvent = e),
                  (this.type = e.type),
                  (this.isDefaultPrevented = e.defaultPrevented || (void 0 === e.defaultPrevented && !1 === e.returnValue) ? ke : Se),
                  (this.target = e.target && 3 === e.target.nodeType ? e.target.parentNode : e.target),
                  (this.currentTarget = e.currentTarget),
                  (this.relatedTarget = e.relatedTarget))
                : (this.type = e),
                t && k.extend(this, t),
                (this.timeStamp = (e && e.timeStamp) || Date.now()),
                (this[k.expando] = !0);
        }),
        (k.Event.prototype = {
            constructor: k.Event,
            isDefaultPrevented: Se,
            isPropagationStopped: Se,
            isImmediatePropagationStopped: Se,
            isSimulated: !1,
            preventDefault: function () {
                var e = this.originalEvent;
                (this.isDefaultPrevented = ke), e && !this.isSimulated && e.preventDefault();
            },
            stopPropagation: function () {
                var e = this.originalEvent;
                (this.isPropagationStopped = ke), e && !this.isSimulated && e.stopPropagation();
            },
            stopImmediatePropagation: function () {
                var e = this.originalEvent;
                (this.isImmediatePropagationStopped = ke), e && !this.isSimulated && e.stopImmediatePropagation(), this.stopPropagation();
            },
        }),
        k.each(
            {
                altKey: !0,
                bubbles: !0,
                cancelable: !0,
                changedTouches: !0,
                ctrlKey: !0,
                detail: !0,
                eventPhase: !0,
                metaKey: !0,
                pageX: !0,
                pageY: !0,
                shiftKey: !0,
                view: !0,
                char: !0,
                code: !0,
                charCode: !0,
                key: !0,
                keyCode: !0,
                button: !0,
                buttons: !0,
                clientX: !0,
                clientY: !0,
                offsetX: !0,
                offsetY: !0,
                pointerId: !0,
                pointerType: !0,
                screenX: !0,
                screenY: !0,
                targetTouches: !0,
                toElement: !0,
                touches: !0,
                which: function (e) {
                    var t = e.button;
                    return null == e.which && Te.test(e.type) ? (null != e.charCode ? e.charCode : e.keyCode) : !e.which && void 0 !== t && Ce.test(e.type) ? (1 & t ? 1 : 2 & t ? 3 : 4 & t ? 2 : 0) : e.which;
                },
            },
            k.event.addProp
        ),
        k.each({ focus: "focusin", blur: "focusout" }, function (e, t) {
            k.event.special[e] = {
                setup: function () {
                    return De(this, e, Ne), !1;
                },
                trigger: function () {
                    return De(this, e), !0;
                },
                delegateType: t,
            };
        }),
        k.each({ mouseenter: "mouseover", mouseleave: "mouseout", pointerenter: "pointerover", pointerleave: "pointerout" }, function (e, i) {
            k.event.special[e] = {
                delegateType: i,
                bindType: i,
                handle: function (e) {
                    var t,
                        n = e.relatedTarget,
                        r = e.handleObj;
                    return (n && (n === this || k.contains(this, n))) || ((e.type = r.origType), (t = r.handler.apply(this, arguments)), (e.type = i)), t;
                },
            };
        }),
        k.fn.extend({
            on: function (e, t, n, r) {
                return Ae(this, e, t, n, r);
            },
            one: function (e, t, n, r) {
                return Ae(this, e, t, n, r, 1);
            },
            off: function (e, t, n) {
                var r, i;
                if (e && e.preventDefault && e.handleObj) return (r = e.handleObj), k(e.delegateTarget).off(r.namespace ? r.origType + "." + r.namespace : r.origType, r.selector, r.handler), this;
                if ("object" == typeof e) {
                    for (i in e) this.off(i, t, e[i]);
                    return this;
                }
                return (
                    (!1 !== t && "function" != typeof t) || ((n = t), (t = void 0)),
                    !1 === n && (n = Se),
                    this.each(function () {
                        k.event.remove(this, e, n, t);
                    })
                );
            },
        });
    var je = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([a-z][^\/\0>\x20\t\r\n\f]*)[^>]*)\/>/gi,
        qe = /<script|<style|<link/i,
        Le = /checked\s*(?:[^=]|=\s*.checked.)/i,
        He = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g;
    function Oe(e, t) {
        return (A(e, "table") && A(11 !== t.nodeType ? t : t.firstChild, "tr") && k(e).children("tbody")[0]) || e;
    }
    function Pe(e) {
        return (e.type = (null !== e.getAttribute("type")) + "/" + e.type), e;
    }
    function Re(e) {
        return "true/" === (e.type || "").slice(0, 5) ? (e.type = e.type.slice(5)) : e.removeAttribute("type"), e;
    }
    function Me(e, t) {
        var n, r, i, o, a, s, u, l;
        if (1 === t.nodeType) {
            if (Q.hasData(e) && ((o = Q.access(e)), (a = Q.set(t, o)), (l = o.events))) for (i in (delete a.handle, (a.events = {}), l)) for (n = 0, r = l[i].length; n < r; n++) k.event.add(t, i, l[i][n]);
            J.hasData(e) && ((s = J.access(e)), (u = k.extend({}, s)), J.set(t, u));
        }
    }
    function Ie(n, r, i, o) {
        r = g.apply([], r);
        var e,
            t,
            a,
            s,
            u,
            l,
            c = 0,
            f = n.length,
            p = f - 1,
            d = r[0],
            h = m(d);
        if (h || (1 < f && "string" == typeof d && !y.checkClone && Le.test(d)))
            return n.each(function (e) {
                var t = n.eq(e);
                h && (r[0] = d.call(this, e, t.html())), Ie(t, r, i, o);
            });
        if (f && ((t = (e = we(r, n[0].ownerDocument, !1, n, o)).firstChild), 1 === e.childNodes.length && (e = t), t || o)) {
            for (s = (a = k.map(ve(e, "script"), Pe)).length; c < f; c++) (u = e), c !== p && ((u = k.clone(u, !0, !0)), s && k.merge(a, ve(u, "script"))), i.call(n[c], u, c);
            if (s)
                for (l = a[a.length - 1].ownerDocument, k.map(a, Re), c = 0; c < s; c++)
                    (u = a[c]),
                        he.test(u.type || "") &&
                            !Q.access(u, "globalEval") &&
                            k.contains(l, u) &&
                            (u.src && "module" !== (u.type || "").toLowerCase() ? k._evalUrl && !u.noModule && k._evalUrl(u.src, { nonce: u.nonce || u.getAttribute("nonce") }) : b(u.textContent.replace(He, ""), u, l));
        }
        return n;
    }
    function We(e, t, n) {
        for (var r, i = t ? k.filter(t, e) : e, o = 0; null != (r = i[o]); o++) n || 1 !== r.nodeType || k.cleanData(ve(r)), r.parentNode && (n && oe(r) && ye(ve(r, "script")), r.parentNode.removeChild(r));
        return e;
    }
    k.extend({
        htmlPrefilter: function (e) {
            return e.replace(je, "<$1></$2>");
        },
        clone: function (e, t, n) {
            var r,
                i,
                o,
                a,
                s,
                u,
                l,
                c = e.cloneNode(!0),
                f = oe(e);
            if (!(y.noCloneChecked || (1 !== e.nodeType && 11 !== e.nodeType) || k.isXMLDoc(e)))
                for (a = ve(c), r = 0, i = (o = ve(e)).length; r < i; r++)
                    (s = o[r]), (u = a[r]), void 0, "input" === (l = u.nodeName.toLowerCase()) && pe.test(s.type) ? (u.checked = s.checked) : ("input" !== l && "textarea" !== l) || (u.defaultValue = s.defaultValue);
            if (t)
                if (n) for (o = o || ve(e), a = a || ve(c), r = 0, i = o.length; r < i; r++) Me(o[r], a[r]);
                else Me(e, c);
            return 0 < (a = ve(c, "script")).length && ye(a, !f && ve(e, "script")), c;
        },
        cleanData: function (e) {
            for (var t, n, r, i = k.event.special, o = 0; void 0 !== (n = e[o]); o++)
                if (G(n)) {
                    if ((t = n[Q.expando])) {
                        if (t.events) for (r in t.events) i[r] ? k.event.remove(n, r) : k.removeEvent(n, r, t.handle);
                        n[Q.expando] = void 0;
                    }
                    n[J.expando] && (n[J.expando] = void 0);
                }
        },
    }),
        k.fn.extend({
            detach: function (e) {
                return We(this, e, !0);
            },
            remove: function (e) {
                return We(this, e);
            },
            text: function (e) {
                return _(
                    this,
                    function (e) {
                        return void 0 === e
                            ? k.text(this)
                            : this.empty().each(function () {
                                  (1 !== this.nodeType && 11 !== this.nodeType && 9 !== this.nodeType) || (this.textContent = e);
                              });
                    },
                    null,
                    e,
                    arguments.length
                );
            },
            append: function () {
                return Ie(this, arguments, function (e) {
                    (1 !== this.nodeType && 11 !== this.nodeType && 9 !== this.nodeType) || Oe(this, e).appendChild(e);
                });
            },
            prepend: function () {
                return Ie(this, arguments, function (e) {
                    if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                        var t = Oe(this, e);
                        t.insertBefore(e, t.firstChild);
                    }
                });
            },
            before: function () {
                return Ie(this, arguments, function (e) {
                    this.parentNode && this.parentNode.insertBefore(e, this);
                });
            },
            after: function () {
                return Ie(this, arguments, function (e) {
                    this.parentNode && this.parentNode.insertBefore(e, this.nextSibling);
                });
            },
            empty: function () {
                for (var e, t = 0; null != (e = this[t]); t++) 1 === e.nodeType && (k.cleanData(ve(e, !1)), (e.textContent = ""));
                return this;
            },
            clone: function (e, t) {
                return (
                    (e = null != e && e),
                    (t = null == t ? e : t),
                    this.map(function () {
                        return k.clone(this, e, t);
                    })
                );
            },
            html: function (e) {
                return _(
                    this,
                    function (e) {
                        var t = this[0] || {},
                            n = 0,
                            r = this.length;
                        if (void 0 === e && 1 === t.nodeType) return t.innerHTML;
                        if ("string" == typeof e && !qe.test(e) && !ge[(de.exec(e) || ["", ""])[1].toLowerCase()]) {
                            e = k.htmlPrefilter(e);
                            try {
                                for (; n < r; n++) 1 === (t = this[n] || {}).nodeType && (k.cleanData(ve(t, !1)), (t.innerHTML = e));
                                t = 0;
                            } catch (e) {}
                        }
                        t && this.empty().append(e);
                    },
                    null,
                    e,
                    arguments.length
                );
            },
            replaceWith: function () {
                var n = [];
                return Ie(
                    this,
                    arguments,
                    function (e) {
                        var t = this.parentNode;
                        k.inArray(this, n) < 0 && (k.cleanData(ve(this)), t && t.replaceChild(e, this));
                    },
                    n
                );
            },
        }),
        k.each({ appendTo: "append", prependTo: "prepend", insertBefore: "before", insertAfter: "after", replaceAll: "replaceWith" }, function (e, a) {
            k.fn[e] = function (e) {
                for (var t, n = [], r = k(e), i = r.length - 1, o = 0; o <= i; o++) (t = o === i ? this : this.clone(!0)), k(r[o])[a](t), u.apply(n, t.get());
                return this.pushStack(n);
            };
        });
    var $e = new RegExp("^(" + te + ")(?!px)[a-z%]+$", "i"),
        Fe = function (e) {
            var t = e.ownerDocument.defaultView;
            return (t && t.opener) || (t = C), t.getComputedStyle(e);
        },
        Be = new RegExp(re.join("|"), "i");
    function _e(e, t, n) {
        var r,
            i,
            o,
            a,
            s = e.style;
        return (
            (n = n || Fe(e)) &&
                ("" !== (a = n.getPropertyValue(t) || n[t]) || oe(e) || (a = k.style(e, t)),
                !y.pixelBoxStyles() && $e.test(a) && Be.test(t) && ((r = s.width), (i = s.minWidth), (o = s.maxWidth), (s.minWidth = s.maxWidth = s.width = a), (a = n.width), (s.width = r), (s.minWidth = i), (s.maxWidth = o))),
            void 0 !== a ? a + "" : a
        );
    }
    function ze(e, t) {
        return {
            get: function () {
                if (!e()) return (this.get = t).apply(this, arguments);
                delete this.get;
            },
        };
    }
    !(function () {
        function e() {
            if (u) {
                (s.style.cssText = "position:absolute;left:-11111px;width:60px;margin-top:1px;padding:0;border:0"),
                    (u.style.cssText = "position:relative;display:block;box-sizing:border-box;overflow:scroll;margin:auto;border:1px;padding:1px;width:60%;top:1%"),
                    ie.appendChild(s).appendChild(u);
                var e = C.getComputedStyle(u);
                (n = "1%" !== e.top),
                    (a = 12 === t(e.marginLeft)),
                    (u.style.right = "60%"),
                    (o = 36 === t(e.right)),
                    (r = 36 === t(e.width)),
                    (u.style.position = "absolute"),
                    (i = 12 === t(u.offsetWidth / 3)),
                    ie.removeChild(s),
                    (u = null);
            }
        }
        function t(e) {
            return Math.round(parseFloat(e));
        }
        var n,
            r,
            i,
            o,
            a,
            s = E.createElement("div"),
            u = E.createElement("div");
        u.style &&
            ((u.style.backgroundClip = "content-box"),
            (u.cloneNode(!0).style.backgroundClip = ""),
            (y.clearCloneStyle = "content-box" === u.style.backgroundClip),
            k.extend(y, {
                boxSizingReliable: function () {
                    return e(), r;
                },
                pixelBoxStyles: function () {
                    return e(), o;
                },
                pixelPosition: function () {
                    return e(), n;
                },
                reliableMarginLeft: function () {
                    return e(), a;
                },
                scrollboxSize: function () {
                    return e(), i;
                },
            }));
    })();
    var Ue = ["Webkit", "Moz", "ms"],
        Xe = E.createElement("div").style,
        Ve = {};
    function Ge(e) {
        var t = k.cssProps[e] || Ve[e];
        return (
            t ||
            (e in Xe
                ? e
                : (Ve[e] =
                      (function (e) {
                          var t = e[0].toUpperCase() + e.slice(1),
                              n = Ue.length;
                          while (n--) if ((e = Ue[n] + t) in Xe) return e;
                      })(e) || e))
        );
    }
    var Ye = /^(none|table(?!-c[ea]).+)/,
        Qe = /^--/,
        Je = { position: "absolute", visibility: "hidden", display: "block" },
        Ke = { letterSpacing: "0", fontWeight: "400" };
    function Ze(e, t, n) {
        var r = ne.exec(t);
        return r ? Math.max(0, r[2] - (n || 0)) + (r[3] || "px") : t;
    }
    function et(e, t, n, r, i, o) {
        var a = "width" === t ? 1 : 0,
            s = 0,
            u = 0;
        if (n === (r ? "border" : "content")) return 0;
        for (; a < 4; a += 2)
            "margin" === n && (u += k.css(e, n + re[a], !0, i)),
                r
                    ? ("content" === n && (u -= k.css(e, "padding" + re[a], !0, i)), "margin" !== n && (u -= k.css(e, "border" + re[a] + "Width", !0, i)))
                    : ((u += k.css(e, "padding" + re[a], !0, i)), "padding" !== n ? (u += k.css(e, "border" + re[a] + "Width", !0, i)) : (s += k.css(e, "border" + re[a] + "Width", !0, i)));
        return !r && 0 <= o && (u += Math.max(0, Math.ceil(e["offset" + t[0].toUpperCase() + t.slice(1)] - o - u - s - 0.5)) || 0), u;
    }
    function tt(e, t, n) {
        var r = Fe(e),
            i = (!y.boxSizingReliable() || n) && "border-box" === k.css(e, "boxSizing", !1, r),
            o = i,
            a = _e(e, t, r),
            s = "offset" + t[0].toUpperCase() + t.slice(1);
        if ($e.test(a)) {
            if (!n) return a;
            a = "auto";
        }
        return (
            ((!y.boxSizingReliable() && i) || "auto" === a || (!parseFloat(a) && "inline" === k.css(e, "display", !1, r))) && e.getClientRects().length && ((i = "border-box" === k.css(e, "boxSizing", !1, r)), (o = s in e) && (a = e[s])),
            (a = parseFloat(a) || 0) + et(e, t, n || (i ? "border" : "content"), o, r, a) + "px"
        );
    }
    function nt(e, t, n, r, i) {
        return new nt.prototype.init(e, t, n, r, i);
    }
    k.extend({
        cssHooks: {
            opacity: {
                get: function (e, t) {
                    if (t) {
                        var n = _e(e, "opacity");
                        return "" === n ? "1" : n;
                    }
                },
            },
        },
        cssNumber: {
            animationIterationCount: !0,
            columnCount: !0,
            fillOpacity: !0,
            flexGrow: !0,
            flexShrink: !0,
            fontWeight: !0,
            gridArea: !0,
            gridColumn: !0,
            gridColumnEnd: !0,
            gridColumnStart: !0,
            gridRow: !0,
            gridRowEnd: !0,
            gridRowStart: !0,
            lineHeight: !0,
            opacity: !0,
            order: !0,
            orphans: !0,
            widows: !0,
            zIndex: !0,
            zoom: !0,
        },
        cssProps: {},
        style: function (e, t, n, r) {
            if (e && 3 !== e.nodeType && 8 !== e.nodeType && e.style) {
                var i,
                    o,
                    a,
                    s = V(t),
                    u = Qe.test(t),
                    l = e.style;
                if ((u || (t = Ge(s)), (a = k.cssHooks[t] || k.cssHooks[s]), void 0 === n)) return a && "get" in a && void 0 !== (i = a.get(e, !1, r)) ? i : l[t];
                "string" === (o = typeof n) && (i = ne.exec(n)) && i[1] && ((n = le(e, t, i)), (o = "number")),
                    null != n &&
                        n == n &&
                        ("number" !== o || u || (n += (i && i[3]) || (k.cssNumber[s] ? "" : "px")),
                        y.clearCloneStyle || "" !== n || 0 !== t.indexOf("background") || (l[t] = "inherit"),
                        (a && "set" in a && void 0 === (n = a.set(e, n, r))) || (u ? l.setProperty(t, n) : (l[t] = n)));
            }
        },
        css: function (e, t, n, r) {
            var i,
                o,
                a,
                s = V(t);
            return (
                Qe.test(t) || (t = Ge(s)),
                (a = k.cssHooks[t] || k.cssHooks[s]) && "get" in a && (i = a.get(e, !0, n)),
                void 0 === i && (i = _e(e, t, r)),
                "normal" === i && t in Ke && (i = Ke[t]),
                "" === n || n ? ((o = parseFloat(i)), !0 === n || isFinite(o) ? o || 0 : i) : i
            );
        },
    }),
        k.each(["height", "width"], function (e, u) {
            k.cssHooks[u] = {
                get: function (e, t, n) {
                    if (t)
                        return !Ye.test(k.css(e, "display")) || (e.getClientRects().length && e.getBoundingClientRect().width)
                            ? tt(e, u, n)
                            : ue(e, Je, function () {
                                  return tt(e, u, n);
                              });
                },
                set: function (e, t, n) {
                    var r,
                        i = Fe(e),
                        o = !y.scrollboxSize() && "absolute" === i.position,
                        a = (o || n) && "border-box" === k.css(e, "boxSizing", !1, i),
                        s = n ? et(e, u, n, a, i) : 0;
                    return (
                        a && o && (s -= Math.ceil(e["offset" + u[0].toUpperCase() + u.slice(1)] - parseFloat(i[u]) - et(e, u, "border", !1, i) - 0.5)),
                        s && (r = ne.exec(t)) && "px" !== (r[3] || "px") && ((e.style[u] = t), (t = k.css(e, u))),
                        Ze(0, t, s)
                    );
                },
            };
        }),
        (k.cssHooks.marginLeft = ze(y.reliableMarginLeft, function (e, t) {
            if (t)
                return (
                    (parseFloat(_e(e, "marginLeft")) ||
                        e.getBoundingClientRect().left -
                            ue(e, { marginLeft: 0 }, function () {
                                return e.getBoundingClientRect().left;
                            })) + "px"
                );
        })),
        k.each({ margin: "", padding: "", border: "Width" }, function (i, o) {
            (k.cssHooks[i + o] = {
                expand: function (e) {
                    for (var t = 0, n = {}, r = "string" == typeof e ? e.split(" ") : [e]; t < 4; t++) n[i + re[t] + o] = r[t] || r[t - 2] || r[0];
                    return n;
                },
            }),
                "margin" !== i && (k.cssHooks[i + o].set = Ze);
        }),
        k.fn.extend({
            css: function (e, t) {
                return _(
                    this,
                    function (e, t, n) {
                        var r,
                            i,
                            o = {},
                            a = 0;
                        if (Array.isArray(t)) {
                            for (r = Fe(e), i = t.length; a < i; a++) o[t[a]] = k.css(e, t[a], !1, r);
                            return o;
                        }
                        return void 0 !== n ? k.style(e, t, n) : k.css(e, t);
                    },
                    e,
                    t,
                    1 < arguments.length
                );
            },
        }),
        (((k.Tween = nt).prototype = {
            constructor: nt,
            init: function (e, t, n, r, i, o) {
                (this.elem = e), (this.prop = n), (this.easing = i || k.easing._default), (this.options = t), (this.start = this.now = this.cur()), (this.end = r), (this.unit = o || (k.cssNumber[n] ? "" : "px"));
            },
            cur: function () {
                var e = nt.propHooks[this.prop];
                return e && e.get ? e.get(this) : nt.propHooks._default.get(this);
            },
            run: function (e) {
                var t,
                    n = nt.propHooks[this.prop];
                return (
                    this.options.duration ? (this.pos = t = k.easing[this.easing](e, this.options.duration * e, 0, 1, this.options.duration)) : (this.pos = t = e),
                    (this.now = (this.end - this.start) * t + this.start),
                    this.options.step && this.options.step.call(this.elem, this.now, this),
                    n && n.set ? n.set(this) : nt.propHooks._default.set(this),
                    this
                );
            },
        }).init.prototype = nt.prototype),
        ((nt.propHooks = {
            _default: {
                get: function (e) {
                    var t;
                    return 1 !== e.elem.nodeType || (null != e.elem[e.prop] && null == e.elem.style[e.prop]) ? e.elem[e.prop] : (t = k.css(e.elem, e.prop, "")) && "auto" !== t ? t : 0;
                },
                set: function (e) {
                    k.fx.step[e.prop] ? k.fx.step[e.prop](e) : 1 !== e.elem.nodeType || (!k.cssHooks[e.prop] && null == e.elem.style[Ge(e.prop)]) ? (e.elem[e.prop] = e.now) : k.style(e.elem, e.prop, e.now + e.unit);
                },
            },
        }).scrollTop = nt.propHooks.scrollLeft = {
            set: function (e) {
                e.elem.nodeType && e.elem.parentNode && (e.elem[e.prop] = e.now);
            },
        }),
        (k.easing = {
            linear: function (e) {
                return e;
            },
            swing: function (e) {
                return 0.5 - Math.cos(e * Math.PI) / 2;
            },
            _default: "swing",
        }),
        (k.fx = nt.prototype.init),
        (k.fx.step = {});
    var rt,
        it,
        ot,
        at,
        st = /^(?:toggle|show|hide)$/,
        ut = /queueHooks$/;
    function lt() {
        it && (!1 === E.hidden && C.requestAnimationFrame ? C.requestAnimationFrame(lt) : C.setTimeout(lt, k.fx.interval), k.fx.tick());
    }
    function ct() {
        return (
            C.setTimeout(function () {
                rt = void 0;
            }),
            (rt = Date.now())
        );
    }
    function ft(e, t) {
        var n,
            r = 0,
            i = { height: e };
        for (t = t ? 1 : 0; r < 4; r += 2 - t) i["margin" + (n = re[r])] = i["padding" + n] = e;
        return t && (i.opacity = i.width = e), i;
    }
    function pt(e, t, n) {
        for (var r, i = (dt.tweeners[t] || []).concat(dt.tweeners["*"]), o = 0, a = i.length; o < a; o++) if ((r = i[o].call(n, t, e))) return r;
    }
    function dt(o, e, t) {
        var n,
            a,
            r = 0,
            i = dt.prefilters.length,
            s = k.Deferred().always(function () {
                delete u.elem;
            }),
            u = function () {
                if (a) return !1;
                for (var e = rt || ct(), t = Math.max(0, l.startTime + l.duration - e), n = 1 - (t / l.duration || 0), r = 0, i = l.tweens.length; r < i; r++) l.tweens[r].run(n);
                return s.notifyWith(o, [l, n, t]), n < 1 && i ? t : (i || s.notifyWith(o, [l, 1, 0]), s.resolveWith(o, [l]), !1);
            },
            l = s.promise({
                elem: o,
                props: k.extend({}, e),
                opts: k.extend(!0, { specialEasing: {}, easing: k.easing._default }, t),
                originalProperties: e,
                originalOptions: t,
                startTime: rt || ct(),
                duration: t.duration,
                tweens: [],
                createTween: function (e, t) {
                    var n = k.Tween(o, l.opts, e, t, l.opts.specialEasing[e] || l.opts.easing);
                    return l.tweens.push(n), n;
                },
                stop: function (e) {
                    var t = 0,
                        n = e ? l.tweens.length : 0;
                    if (a) return this;
                    for (a = !0; t < n; t++) l.tweens[t].run(1);
                    return e ? (s.notifyWith(o, [l, 1, 0]), s.resolveWith(o, [l, e])) : s.rejectWith(o, [l, e]), this;
                },
            }),
            c = l.props;
        for (
            !(function (e, t) {
                var n, r, i, o, a;
                for (n in e)
                    if (((i = t[(r = V(n))]), (o = e[n]), Array.isArray(o) && ((i = o[1]), (o = e[n] = o[0])), n !== r && ((e[r] = o), delete e[n]), (a = k.cssHooks[r]) && ("expand" in a)))
                        for (n in ((o = a.expand(o)), delete e[r], o)) (n in e) || ((e[n] = o[n]), (t[n] = i));
                    else t[r] = i;
            })(c, l.opts.specialEasing);
            r < i;
            r++
        )
            if ((n = dt.prefilters[r].call(l, o, c, l.opts))) return m(n.stop) && (k._queueHooks(l.elem, l.opts.queue).stop = n.stop.bind(n)), n;
        return (
            k.map(c, pt, l),
            m(l.opts.start) && l.opts.start.call(o, l),
            l.progress(l.opts.progress).done(l.opts.done, l.opts.complete).fail(l.opts.fail).always(l.opts.always),
            k.fx.timer(k.extend(u, { elem: o, anim: l, queue: l.opts.queue })),
            l
        );
    }
    (k.Animation = k.extend(dt, {
        tweeners: {
            "*": [
                function (e, t) {
                    var n = this.createTween(e, t);
                    return le(n.elem, e, ne.exec(t), n), n;
                },
            ],
        },
        tweener: function (e, t) {
            m(e) ? ((t = e), (e = ["*"])) : (e = e.match(R));
            for (var n, r = 0, i = e.length; r < i; r++) (n = e[r]), (dt.tweeners[n] = dt.tweeners[n] || []), dt.tweeners[n].unshift(t);
        },
        prefilters: [
            function (e, t, n) {
                var r,
                    i,
                    o,
                    a,
                    s,
                    u,
                    l,
                    c,
                    f = "width" in t || "height" in t,
                    p = this,
                    d = {},
                    h = e.style,
                    g = e.nodeType && se(e),
                    v = Q.get(e, "fxshow");
                for (r in (n.queue ||
                    (null == (a = k._queueHooks(e, "fx")).unqueued &&
                        ((a.unqueued = 0),
                        (s = a.empty.fire),
                        (a.empty.fire = function () {
                            a.unqueued || s();
                        })),
                    a.unqueued++,
                    p.always(function () {
                        p.always(function () {
                            a.unqueued--, k.queue(e, "fx").length || a.empty.fire();
                        });
                    })),
                t))
                    if (((i = t[r]), st.test(i))) {
                        if ((delete t[r], (o = o || "toggle" === i), i === (g ? "hide" : "show"))) {
                            if ("show" !== i || !v || void 0 === v[r]) continue;
                            g = !0;
                        }
                        d[r] = (v && v[r]) || k.style(e, r);
                    }
                if ((u = !k.isEmptyObject(t)) || !k.isEmptyObject(d))
                    for (r in (f &&
                        1 === e.nodeType &&
                        ((n.overflow = [h.overflow, h.overflowX, h.overflowY]),
                        null == (l = v && v.display) && (l = Q.get(e, "display")),
                        "none" === (c = k.css(e, "display")) && (l ? (c = l) : (fe([e], !0), (l = e.style.display || l), (c = k.css(e, "display")), fe([e]))),
                        ("inline" === c || ("inline-block" === c && null != l)) &&
                            "none" === k.css(e, "float") &&
                            (u ||
                                (p.done(function () {
                                    h.display = l;
                                }),
                                null == l && ((c = h.display), (l = "none" === c ? "" : c))),
                            (h.display = "inline-block"))),
                    n.overflow &&
                        ((h.overflow = "hidden"),
                        p.always(function () {
                            (h.overflow = n.overflow[0]), (h.overflowX = n.overflow[1]), (h.overflowY = n.overflow[2]);
                        })),
                    (u = !1),
                    d))
                        u ||
                            (v ? "hidden" in v && (g = v.hidden) : (v = Q.access(e, "fxshow", { display: l })),
                            o && (v.hidden = !g),
                            g && fe([e], !0),
                            p.done(function () {
                                for (r in (g || fe([e]), Q.remove(e, "fxshow"), d)) k.style(e, r, d[r]);
                            })),
                            (u = pt(g ? v[r] : 0, r, p)),
                            r in v || ((v[r] = u.start), g && ((u.end = u.start), (u.start = 0)));
            },
        ],
        prefilter: function (e, t) {
            t ? dt.prefilters.unshift(e) : dt.prefilters.push(e);
        },
    })),
        (k.speed = function (e, t, n) {
            var r = e && "object" == typeof e ? k.extend({}, e) : { complete: n || (!n && t) || (m(e) && e), duration: e, easing: (n && t) || (t && !m(t) && t) };
            return (
                k.fx.off ? (r.duration = 0) : "number" != typeof r.duration && (r.duration in k.fx.speeds ? (r.duration = k.fx.speeds[r.duration]) : (r.duration = k.fx.speeds._default)),
                (null != r.queue && !0 !== r.queue) || (r.queue = "fx"),
                (r.old = r.complete),
                (r.complete = function () {
                    m(r.old) && r.old.call(this), r.queue && k.dequeue(this, r.queue);
                }),
                r
            );
        }),
        k.fn.extend({
            fadeTo: function (e, t, n, r) {
                return this.filter(se).css("opacity", 0).show().end().animate({ opacity: t }, e, n, r);
            },
            animate: function (t, e, n, r) {
                var i = k.isEmptyObject(t),
                    o = k.speed(e, n, r),
                    a = function () {
                        var e = dt(this, k.extend({}, t), o);
                        (i || Q.get(this, "finish")) && e.stop(!0);
                    };
                return (a.finish = a), i || !1 === o.queue ? this.each(a) : this.queue(o.queue, a);
            },
            stop: function (i, e, o) {
                var a = function (e) {
                    var t = e.stop;
                    delete e.stop, t(o);
                };
                return (
                    "string" != typeof i && ((o = e), (e = i), (i = void 0)),
                    e && !1 !== i && this.queue(i || "fx", []),
                    this.each(function () {
                        var e = !0,
                            t = null != i && i + "queueHooks",
                            n = k.timers,
                            r = Q.get(this);
                        if (t) r[t] && r[t].stop && a(r[t]);
                        else for (t in r) r[t] && r[t].stop && ut.test(t) && a(r[t]);
                        for (t = n.length; t--; ) n[t].elem !== this || (null != i && n[t].queue !== i) || (n[t].anim.stop(o), (e = !1), n.splice(t, 1));
                        (!e && o) || k.dequeue(this, i);
                    })
                );
            },
            finish: function (a) {
                return (
                    !1 !== a && (a = a || "fx"),
                    this.each(function () {
                        var e,
                            t = Q.get(this),
                            n = t[a + "queue"],
                            r = t[a + "queueHooks"],
                            i = k.timers,
                            o = n ? n.length : 0;
                        for (t.finish = !0, k.queue(this, a, []), r && r.stop && r.stop.call(this, !0), e = i.length; e--; ) i[e].elem === this && i[e].queue === a && (i[e].anim.stop(!0), i.splice(e, 1));
                        for (e = 0; e < o; e++) n[e] && n[e].finish && n[e].finish.call(this);
                        delete t.finish;
                    })
                );
            },
        }),
        k.each(["toggle", "show", "hide"], function (e, r) {
            var i = k.fn[r];
            k.fn[r] = function (e, t, n) {
                return null == e || "boolean" == typeof e ? i.apply(this, arguments) : this.animate(ft(r, !0), e, t, n);
            };
        }),
        k.each({ slideDown: ft("show"), slideUp: ft("hide"), slideToggle: ft("toggle"), fadeIn: { opacity: "show" }, fadeOut: { opacity: "hide" }, fadeToggle: { opacity: "toggle" } }, function (e, r) {
            k.fn[e] = function (e, t, n) {
                return this.animate(r, e, t, n);
            };
        }),
        (k.timers = []),
        (k.fx.tick = function () {
            var e,
                t = 0,
                n = k.timers;
            for (rt = Date.now(); t < n.length; t++) (e = n[t])() || n[t] !== e || n.splice(t--, 1);
            n.length || k.fx.stop(), (rt = void 0);
        }),
        (k.fx.timer = function (e) {
            k.timers.push(e), k.fx.start();
        }),
        (k.fx.interval = 13),
        (k.fx.start = function () {
            it || ((it = !0), lt());
        }),
        (k.fx.stop = function () {
            it = null;
        }),
        (k.fx.speeds = { slow: 600, fast: 200, _default: 400 }),
        (k.fn.delay = function (r, e) {
            return (
                (r = (k.fx && k.fx.speeds[r]) || r),
                (e = e || "fx"),
                this.queue(e, function (e, t) {
                    var n = C.setTimeout(e, r);
                    t.stop = function () {
                        C.clearTimeout(n);
                    };
                })
            );
        }),
        (ot = E.createElement("input")),
        (at = E.createElement("select").appendChild(E.createElement("option"))),
        (ot.type = "checkbox"),
        (y.checkOn = "" !== ot.value),
        (y.optSelected = at.selected),
        ((ot = E.createElement("input")).value = "t"),
        (ot.type = "radio"),
        (y.radioValue = "t" === ot.value);
    var ht,
        gt = k.expr.attrHandle;
    k.fn.extend({
        attr: function (e, t) {
            return _(this, k.attr, e, t, 1 < arguments.length);
        },
        removeAttr: function (e) {
            return this.each(function () {
                k.removeAttr(this, e);
            });
        },
    }),
        k.extend({
            attr: function (e, t, n) {
                var r,
                    i,
                    o = e.nodeType;
                if (3 !== o && 8 !== o && 2 !== o)
                    return "undefined" == typeof e.getAttribute
                        ? k.prop(e, t, n)
                        : ((1 === o && k.isXMLDoc(e)) || (i = k.attrHooks[t.toLowerCase()] || (k.expr.match.bool.test(t) ? ht : void 0)),
                          void 0 !== n
                              ? null === n
                                  ? void k.removeAttr(e, t)
                                  : i && "set" in i && void 0 !== (r = i.set(e, n, t))
                                  ? r
                                  : (e.setAttribute(t, n + ""), n)
                              : i && "get" in i && null !== (r = i.get(e, t))
                              ? r
                              : null == (r = k.find.attr(e, t))
                              ? void 0
                              : r);
            },
            attrHooks: {
                type: {
                    set: function (e, t) {
                        if (!y.radioValue && "radio" === t && A(e, "input")) {
                            var n = e.value;
                            return e.setAttribute("type", t), n && (e.value = n), t;
                        }
                    },
                },
            },
            removeAttr: function (e, t) {
                var n,
                    r = 0,
                    i = t && t.match(R);
                if (i && 1 === e.nodeType) while ((n = i[r++])) e.removeAttribute(n);
            },
        }),
        (ht = {
            set: function (e, t, n) {
                return !1 === t ? k.removeAttr(e, n) : e.setAttribute(n, n), n;
            },
        }),
        k.each(k.expr.match.bool.source.match(/\w+/g), function (e, t) {
            var a = gt[t] || k.find.attr;
            gt[t] = function (e, t, n) {
                var r,
                    i,
                    o = t.toLowerCase();
                return n || ((i = gt[o]), (gt[o] = r), (r = null != a(e, t, n) ? o : null), (gt[o] = i)), r;
            };
        });
    var vt = /^(?:input|select|textarea|button)$/i,
        yt = /^(?:a|area)$/i;
    function mt(e) {
        return (e.match(R) || []).join(" ");
    }
    function xt(e) {
        return (e.getAttribute && e.getAttribute("class")) || "";
    }
    function bt(e) {
        return Array.isArray(e) ? e : ("string" == typeof e && e.match(R)) || [];
    }
    k.fn.extend({
        prop: function (e, t) {
            return _(this, k.prop, e, t, 1 < arguments.length);
        },
        removeProp: function (e) {
            return this.each(function () {
                delete this[k.propFix[e] || e];
            });
        },
    }),
        k.extend({
            prop: function (e, t, n) {
                var r,
                    i,
                    o = e.nodeType;
                if (3 !== o && 8 !== o && 2 !== o)
                    return (
                        (1 === o && k.isXMLDoc(e)) || ((t = k.propFix[t] || t), (i = k.propHooks[t])),
                        void 0 !== n ? (i && "set" in i && void 0 !== (r = i.set(e, n, t)) ? r : (e[t] = n)) : i && "get" in i && null !== (r = i.get(e, t)) ? r : e[t]
                    );
            },
            propHooks: {
                tabIndex: {
                    get: function (e) {
                        var t = k.find.attr(e, "tabindex");
                        return t ? parseInt(t, 10) : vt.test(e.nodeName) || (yt.test(e.nodeName) && e.href) ? 0 : -1;
                    },
                },
            },
            propFix: { for: "htmlFor", class: "className" },
        }),
        y.optSelected ||
            (k.propHooks.selected = {
                get: function (e) {
                    var t = e.parentNode;
                    return t && t.parentNode && t.parentNode.selectedIndex, null;
                },
                set: function (e) {
                    var t = e.parentNode;
                    t && (t.selectedIndex, t.parentNode && t.parentNode.selectedIndex);
                },
            }),
        k.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], function () {
            k.propFix[this.toLowerCase()] = this;
        }),
        k.fn.extend({
            addClass: function (t) {
                var e,
                    n,
                    r,
                    i,
                    o,
                    a,
                    s,
                    u = 0;
                if (m(t))
                    return this.each(function (e) {
                        k(this).addClass(t.call(this, e, xt(this)));
                    });
                if ((e = bt(t)).length)
                    while ((n = this[u++]))
                        if (((i = xt(n)), (r = 1 === n.nodeType && " " + mt(i) + " "))) {
                            a = 0;
                            while ((o = e[a++])) r.indexOf(" " + o + " ") < 0 && (r += o + " ");
                            i !== (s = mt(r)) && n.setAttribute("class", s);
                        }
                return this;
            },
            removeClass: function (t) {
                var e,
                    n,
                    r,
                    i,
                    o,
                    a,
                    s,
                    u = 0;
                if (m(t))
                    return this.each(function (e) {
                        k(this).removeClass(t.call(this, e, xt(this)));
                    });
                if (!arguments.length) return this.attr("class", "");
                if ((e = bt(t)).length)
                    while ((n = this[u++]))
                        if (((i = xt(n)), (r = 1 === n.nodeType && " " + mt(i) + " "))) {
                            a = 0;
                            while ((o = e[a++])) while (-1 < r.indexOf(" " + o + " ")) r = r.replace(" " + o + " ", " ");
                            i !== (s = mt(r)) && n.setAttribute("class", s);
                        }
                return this;
            },
            toggleClass: function (i, t) {
                var o = typeof i,
                    a = "string" === o || Array.isArray(i);
                return "boolean" == typeof t && a
                    ? t
                        ? this.addClass(i)
                        : this.removeClass(i)
                    : m(i)
                    ? this.each(function (e) {
                          k(this).toggleClass(i.call(this, e, xt(this), t), t);
                      })
                    : this.each(function () {
                          var e, t, n, r;
                          if (a) {
                              (t = 0), (n = k(this)), (r = bt(i));
                              while ((e = r[t++])) n.hasClass(e) ? n.removeClass(e) : n.addClass(e);
                          } else (void 0 !== i && "boolean" !== o) || ((e = xt(this)) && Q.set(this, "__className__", e), this.setAttribute && this.setAttribute("class", e || !1 === i ? "" : Q.get(this, "__className__") || ""));
                      });
            },
            hasClass: function (e) {
                var t,
                    n,
                    r = 0;
                t = " " + e + " ";
                while ((n = this[r++])) if (1 === n.nodeType && -1 < (" " + mt(xt(n)) + " ").indexOf(t)) return !0;
                return !1;
            },
        });
    var wt = /\r/g;
    k.fn.extend({
        val: function (n) {
            var r,
                e,
                i,
                t = this[0];
            return arguments.length
                ? ((i = m(n)),
                  this.each(function (e) {
                      var t;
                      1 === this.nodeType &&
                          (null == (t = i ? n.call(this, e, k(this).val()) : n)
                              ? (t = "")
                              : "number" == typeof t
                              ? (t += "")
                              : Array.isArray(t) &&
                                (t = k.map(t, function (e) {
                                    return null == e ? "" : e + "";
                                })),
                          ((r = k.valHooks[this.type] || k.valHooks[this.nodeName.toLowerCase()]) && "set" in r && void 0 !== r.set(this, t, "value")) || (this.value = t));
                  }))
                : t
                ? (r = k.valHooks[t.type] || k.valHooks[t.nodeName.toLowerCase()]) && "get" in r && void 0 !== (e = r.get(t, "value"))
                    ? e
                    : "string" == typeof (e = t.value)
                    ? e.replace(wt, "")
                    : null == e
                    ? ""
                    : e
                : void 0;
        },
    }),
        k.extend({
            valHooks: {
                option: {
                    get: function (e) {
                        var t = k.find.attr(e, "value");
                        return null != t ? t : mt(k.text(e));
                    },
                },
                select: {
                    get: function (e) {
                        var t,
                            n,
                            r,
                            i = e.options,
                            o = e.selectedIndex,
                            a = "select-one" === e.type,
                            s = a ? null : [],
                            u = a ? o + 1 : i.length;
                        for (r = o < 0 ? u : a ? o : 0; r < u; r++)
                            if (((n = i[r]).selected || r === o) && !n.disabled && (!n.parentNode.disabled || !A(n.parentNode, "optgroup"))) {
                                if (((t = k(n).val()), a)) return t;
                                s.push(t);
                            }
                        return s;
                    },
                    set: function (e, t) {
                        var n,
                            r,
                            i = e.options,
                            o = k.makeArray(t),
                            a = i.length;
                        while (a--) ((r = i[a]).selected = -1 < k.inArray(k.valHooks.option.get(r), o)) && (n = !0);
                        return n || (e.selectedIndex = -1), o;
                    },
                },
            },
        }),
        k.each(["radio", "checkbox"], function () {
            (k.valHooks[this] = {
                set: function (e, t) {
                    if (Array.isArray(t)) return (e.checked = -1 < k.inArray(k(e).val(), t));
                },
            }),
                y.checkOn ||
                    (k.valHooks[this].get = function (e) {
                        return null === e.getAttribute("value") ? "on" : e.value;
                    });
        }),
        (y.focusin = "onfocusin" in C);
    var Tt = /^(?:focusinfocus|focusoutblur)$/,
        Ct = function (e) {
            e.stopPropagation();
        };
    k.extend(k.event, {
        trigger: function (e, t, n, r) {
            var i,
                o,
                a,
                s,
                u,
                l,
                c,
                f,
                p = [n || E],
                d = v.call(e, "type") ? e.type : e,
                h = v.call(e, "namespace") ? e.namespace.split(".") : [];
            if (
                ((o = f = a = n = n || E),
                3 !== n.nodeType &&
                    8 !== n.nodeType &&
                    !Tt.test(d + k.event.triggered) &&
                    (-1 < d.indexOf(".") && ((d = (h = d.split(".")).shift()), h.sort()),
                    (u = d.indexOf(":") < 0 && "on" + d),
                    ((e = e[k.expando] ? e : new k.Event(d, "object" == typeof e && e)).isTrigger = r ? 2 : 3),
                    (e.namespace = h.join(".")),
                    (e.rnamespace = e.namespace ? new RegExp("(^|\\.)" + h.join("\\.(?:.*\\.|)") + "(\\.|$)") : null),
                    (e.result = void 0),
                    e.target || (e.target = n),
                    (t = null == t ? [e] : k.makeArray(t, [e])),
                    (c = k.event.special[d] || {}),
                    r || !c.trigger || !1 !== c.trigger.apply(n, t)))
            ) {
                if (!r && !c.noBubble && !x(n)) {
                    for (s = c.delegateType || d, Tt.test(s + d) || (o = o.parentNode); o; o = o.parentNode) p.push(o), (a = o);
                    a === (n.ownerDocument || E) && p.push(a.defaultView || a.parentWindow || C);
                }
                i = 0;
                while ((o = p[i++]) && !e.isPropagationStopped())
                    (f = o),
                        (e.type = 1 < i ? s : c.bindType || d),
                        (l = (Q.get(o, "events") || {})[e.type] && Q.get(o, "handle")) && l.apply(o, t),
                        (l = u && o[u]) && l.apply && G(o) && ((e.result = l.apply(o, t)), !1 === e.result && e.preventDefault());
                return (
                    (e.type = d),
                    r ||
                        e.isDefaultPrevented() ||
                        (c._default && !1 !== c._default.apply(p.pop(), t)) ||
                        !G(n) ||
                        (u &&
                            m(n[d]) &&
                            !x(n) &&
                            ((a = n[u]) && (n[u] = null),
                            (k.event.triggered = d),
                            e.isPropagationStopped() && f.addEventListener(d, Ct),
                            n[d](),
                            e.isPropagationStopped() && f.removeEventListener(d, Ct),
                            (k.event.triggered = void 0),
                            a && (n[u] = a))),
                    e.result
                );
            }
        },
        simulate: function (e, t, n) {
            var r = k.extend(new k.Event(), n, { type: e, isSimulated: !0 });
            k.event.trigger(r, null, t);
        },
    }),
        k.fn.extend({
            trigger: function (e, t) {
                return this.each(function () {
                    k.event.trigger(e, t, this);
                });
            },
            triggerHandler: function (e, t) {
                var n = this[0];
                if (n) return k.event.trigger(e, t, n, !0);
            },
        }),
        y.focusin ||
            k.each({ focus: "focusin", blur: "focusout" }, function (n, r) {
                var i = function (e) {
                    k.event.simulate(r, e.target, k.event.fix(e));
                };
                k.event.special[r] = {
                    setup: function () {
                        var e = this.ownerDocument || this,
                            t = Q.access(e, r);
                        t || e.addEventListener(n, i, !0), Q.access(e, r, (t || 0) + 1);
                    },
                    teardown: function () {
                        var e = this.ownerDocument || this,
                            t = Q.access(e, r) - 1;
                        t ? Q.access(e, r, t) : (e.removeEventListener(n, i, !0), Q.remove(e, r));
                    },
                };
            });
    var Et = C.location,
        kt = Date.now(),
        St = /\?/;
    k.parseXML = function (e) {
        var t;
        if (!e || "string" != typeof e) return null;
        try {
            t = new C.DOMParser().parseFromString(e, "text/xml");
        } catch (e) {
            t = void 0;
        }
        return (t && !t.getElementsByTagName("parsererror").length) || k.error("Invalid XML: " + e), t;
    };
    var Nt = /\[\]$/,
        At = /\r?\n/g,
        Dt = /^(?:submit|button|image|reset|file)$/i,
        jt = /^(?:input|select|textarea|keygen)/i;
    function qt(n, e, r, i) {
        var t;
        if (Array.isArray(e))
            k.each(e, function (e, t) {
                r || Nt.test(n) ? i(n, t) : qt(n + "[" + ("object" == typeof t && null != t ? e : "") + "]", t, r, i);
            });
        else if (r || "object" !== w(e)) i(n, e);
        else for (t in e) qt(n + "[" + t + "]", e[t], r, i);
    }
    (k.param = function (e, t) {
        var n,
            r = [],
            i = function (e, t) {
                var n = m(t) ? t() : t;
                r[r.length] = encodeURIComponent(e) + "=" + encodeURIComponent(null == n ? "" : n);
            };
        if (null == e) return "";
        if (Array.isArray(e) || (e.jquery && !k.isPlainObject(e)))
            k.each(e, function () {
                i(this.name, this.value);
            });
        else for (n in e) qt(n, e[n], t, i);
        return r.join("&");
    }),
        k.fn.extend({
            serialize: function () {
                return k.param(this.serializeArray());
            },
            serializeArray: function () {
                return this.map(function () {
                    var e = k.prop(this, "elements");
                    return e ? k.makeArray(e) : this;
                })
                    .filter(function () {
                        var e = this.type;
                        return this.name && !k(this).is(":disabled") && jt.test(this.nodeName) && !Dt.test(e) && (this.checked || !pe.test(e));
                    })
                    .map(function (e, t) {
                        var n = k(this).val();
                        return null == n
                            ? null
                            : Array.isArray(n)
                            ? k.map(n, function (e) {
                                  return { name: t.name, value: e.replace(At, "\r\n") };
                              })
                            : { name: t.name, value: n.replace(At, "\r\n") };
                    })
                    .get();
            },
        });
    var Lt = /%20/g,
        Ht = /#.*$/,
        Ot = /([?&])_=[^&]*/,
        Pt = /^(.*?):[ \t]*([^\r\n]*)$/gm,
        Rt = /^(?:GET|HEAD)$/,
        Mt = /^\/\//,
        It = {},
        Wt = {},
        $t = "*/".concat("*"),
        Ft = E.createElement("a");
    function Bt(o) {
        return function (e, t) {
            "string" != typeof e && ((t = e), (e = "*"));
            var n,
                r = 0,
                i = e.toLowerCase().match(R) || [];
            if (m(t)) while ((n = i[r++])) "+" === n[0] ? ((n = n.slice(1) || "*"), (o[n] = o[n] || []).unshift(t)) : (o[n] = o[n] || []).push(t);
        };
    }
    function _t(t, i, o, a) {
        var s = {},
            u = t === Wt;
        function l(e) {
            var r;
            return (
                (s[e] = !0),
                k.each(t[e] || [], function (e, t) {
                    var n = t(i, o, a);
                    return "string" != typeof n || u || s[n] ? (u ? !(r = n) : void 0) : (i.dataTypes.unshift(n), l(n), !1);
                }),
                r
            );
        }
        return l(i.dataTypes[0]) || (!s["*"] && l("*"));
    }
    function zt(e, t) {
        var n,
            r,
            i = k.ajaxSettings.flatOptions || {};
        for (n in t) void 0 !== t[n] && ((i[n] ? e : r || (r = {}))[n] = t[n]);
        return r && k.extend(!0, e, r), e;
    }
    (Ft.href = Et.href),
        k.extend({
            active: 0,
            lastModified: {},
            etag: {},
            ajaxSettings: {
                url: Et.href,
                type: "GET",
                isLocal: /^(?:about|app|app-storage|.+-extension|file|res|widget):$/.test(Et.protocol),
                global: !0,
                processData: !0,
                async: !0,
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                accepts: { "*": $t, text: "text/plain", html: "text/html", xml: "application/xml, text/xml", json: "application/json, text/javascript" },
                contents: { xml: /\bxml\b/, html: /\bhtml/, json: /\bjson\b/ },
                responseFields: { xml: "responseXML", text: "responseText", json: "responseJSON" },
                converters: { "* text": String, "text html": !0, "text json": JSON.parse, "text xml": k.parseXML },
                flatOptions: { url: !0, context: !0 },
            },
            ajaxSetup: function (e, t) {
                return t ? zt(zt(e, k.ajaxSettings), t) : zt(k.ajaxSettings, e);
            },
            ajaxPrefilter: Bt(It),
            ajaxTransport: Bt(Wt),
            ajax: function (e, t) {
                "object" == typeof e && ((t = e), (e = void 0)), (t = t || {});
                var c,
                    f,
                    p,
                    n,
                    d,
                    r,
                    h,
                    g,
                    i,
                    o,
                    v = k.ajaxSetup({}, t),
                    y = v.context || v,
                    m = v.context && (y.nodeType || y.jquery) ? k(y) : k.event,
                    x = k.Deferred(),
                    b = k.Callbacks("once memory"),
                    w = v.statusCode || {},
                    a = {},
                    s = {},
                    u = "canceled",
                    T = {
                        readyState: 0,
                        getResponseHeader: function (e) {
                            var t;
                            if (h) {
                                if (!n) {
                                    n = {};
                                    while ((t = Pt.exec(p))) n[t[1].toLowerCase() + " "] = (n[t[1].toLowerCase() + " "] || []).concat(t[2]);
                                }
                                t = n[e.toLowerCase() + " "];
                            }
                            return null == t ? null : t.join(", ");
                        },
                        getAllResponseHeaders: function () {
                            return h ? p : null;
                        },
                        setRequestHeader: function (e, t) {
                            return null == h && ((e = s[e.toLowerCase()] = s[e.toLowerCase()] || e), (a[e] = t)), this;
                        },
                        overrideMimeType: function (e) {
                            return null == h && (v.mimeType = e), this;
                        },
                        statusCode: function (e) {
                            var t;
                            if (e)
                                if (h) T.always(e[T.status]);
                                else for (t in e) w[t] = [w[t], e[t]];
                            return this;
                        },
                        abort: function (e) {
                            var t = e || u;
                            return c && c.abort(t), l(0, t), this;
                        },
                    };
                if (
                    (x.promise(T),
                    (v.url = ((e || v.url || Et.href) + "").replace(Mt, Et.protocol + "//")),
                    (v.type = t.method || t.type || v.method || v.type),
                    (v.dataTypes = (v.dataType || "*").toLowerCase().match(R) || [""]),
                    null == v.crossDomain)
                ) {
                    r = E.createElement("a");
                    try {
                        (r.href = v.url), (r.href = r.href), (v.crossDomain = Ft.protocol + "//" + Ft.host != r.protocol + "//" + r.host);
                    } catch (e) {
                        v.crossDomain = !0;
                    }
                }
                if ((v.data && v.processData && "string" != typeof v.data && (v.data = k.param(v.data, v.traditional)), _t(It, v, t, T), h)) return T;
                for (i in ((g = k.event && v.global) && 0 == k.active++ && k.event.trigger("ajaxStart"),
                (v.type = v.type.toUpperCase()),
                (v.hasContent = !Rt.test(v.type)),
                (f = v.url.replace(Ht, "")),
                v.hasContent
                    ? v.data && v.processData && 0 === (v.contentType || "").indexOf("application/x-www-form-urlencoded") && (v.data = v.data.replace(Lt, "+"))
                    : ((o = v.url.slice(f.length)),
                      v.data && (v.processData || "string" == typeof v.data) && ((f += (St.test(f) ? "&" : "?") + v.data), delete v.data),
                      !1 === v.cache && ((f = f.replace(Ot, "$1")), (o = (St.test(f) ? "&" : "?") + "_=" + kt++ + o)),
                      (v.url = f + o)),
                v.ifModified && (k.lastModified[f] && T.setRequestHeader("If-Modified-Since", k.lastModified[f]), k.etag[f] && T.setRequestHeader("If-None-Match", k.etag[f])),
                ((v.data && v.hasContent && !1 !== v.contentType) || t.contentType) && T.setRequestHeader("Content-Type", v.contentType),
                T.setRequestHeader("Accept", v.dataTypes[0] && v.accepts[v.dataTypes[0]] ? v.accepts[v.dataTypes[0]] + ("*" !== v.dataTypes[0] ? ", " + $t + "; q=0.01" : "") : v.accepts["*"]),
                v.headers))
                    T.setRequestHeader(i, v.headers[i]);
                if (v.beforeSend && (!1 === v.beforeSend.call(y, T, v) || h)) return T.abort();
                if (((u = "abort"), b.add(v.complete), T.done(v.success), T.fail(v.error), (c = _t(Wt, v, t, T)))) {
                    if (((T.readyState = 1), g && m.trigger("ajaxSend", [T, v]), h)) return T;
                    v.async &&
                        0 < v.timeout &&
                        (d = C.setTimeout(function () {
                            T.abort("timeout");
                        }, v.timeout));
                    try {
                        (h = !1), c.send(a, l);
                    } catch (e) {
                        if (h) throw e;
                        l(-1, e);
                    }
                } else l(-1, "No Transport");
                function l(e, t, n, r) {
                    var i,
                        o,
                        a,
                        s,
                        u,
                        l = t;
                    h ||
                        ((h = !0),
                        d && C.clearTimeout(d),
                        (c = void 0),
                        (p = r || ""),
                        (T.readyState = 0 < e ? 4 : 0),
                        (i = (200 <= e && e < 300) || 304 === e),
                        n &&
                            (s = (function (e, t, n) {
                                var r,
                                    i,
                                    o,
                                    a,
                                    s = e.contents,
                                    u = e.dataTypes;
                                while ("*" === u[0]) u.shift(), void 0 === r && (r = e.mimeType || t.getResponseHeader("Content-Type"));
                                if (r)
                                    for (i in s)
                                        if (s[i] && s[i].test(r)) {
                                            u.unshift(i);
                                            break;
                                        }
                                if (u[0] in n) o = u[0];
                                else {
                                    for (i in n) {
                                        if (!u[0] || e.converters[i + " " + u[0]]) {
                                            o = i;
                                            break;
                                        }
                                        a || (a = i);
                                    }
                                    o = o || a;
                                }
                                if (o) return o !== u[0] && u.unshift(o), n[o];
                            })(v, T, n)),
                        (s = (function (e, t, n, r) {
                            var i,
                                o,
                                a,
                                s,
                                u,
                                l = {},
                                c = e.dataTypes.slice();
                            if (c[1]) for (a in e.converters) l[a.toLowerCase()] = e.converters[a];
                            o = c.shift();
                            while (o)
                                if ((e.responseFields[o] && (n[e.responseFields[o]] = t), !u && r && e.dataFilter && (t = e.dataFilter(t, e.dataType)), (u = o), (o = c.shift())))
                                    if ("*" === o) o = u;
                                    else if ("*" !== u && u !== o) {
                                        if (!(a = l[u + " " + o] || l["* " + o]))
                                            for (i in l)
                                                if ((s = i.split(" "))[1] === o && (a = l[u + " " + s[0]] || l["* " + s[0]])) {
                                                    !0 === a ? (a = l[i]) : !0 !== l[i] && ((o = s[0]), c.unshift(s[1]));
                                                    break;
                                                }
                                        if (!0 !== a)
                                            if (a && e["throws"]) t = a(t);
                                            else
                                                try {
                                                    t = a(t);
                                                } catch (e) {
                                                    return { state: "parsererror", error: a ? e : "No conversion from " + u + " to " + o };
                                                }
                                    }
                            return { state: "success", data: t };
                        })(v, s, T, i)),
                        i
                            ? (v.ifModified && ((u = T.getResponseHeader("Last-Modified")) && (k.lastModified[f] = u), (u = T.getResponseHeader("etag")) && (k.etag[f] = u)),
                              204 === e || "HEAD" === v.type ? (l = "nocontent") : 304 === e ? (l = "notmodified") : ((l = s.state), (o = s.data), (i = !(a = s.error))))
                            : ((a = l), (!e && l) || ((l = "error"), e < 0 && (e = 0))),
                        (T.status = e),
                        (T.statusText = (t || l) + ""),
                        i ? x.resolveWith(y, [o, l, T]) : x.rejectWith(y, [T, l, a]),
                        T.statusCode(w),
                        (w = void 0),
                        g && m.trigger(i ? "ajaxSuccess" : "ajaxError", [T, v, i ? o : a]),
                        b.fireWith(y, [T, l]),
                        g && (m.trigger("ajaxComplete", [T, v]), --k.active || k.event.trigger("ajaxStop")));
                }
                return T;
            },
            getJSON: function (e, t, n) {
                return k.get(e, t, n, "json");
            },
            getScript: function (e, t) {
                return k.get(e, void 0, t, "script");
            },
        }),
        k.each(["get", "post"], function (e, i) {
            k[i] = function (e, t, n, r) {
                return m(t) && ((r = r || n), (n = t), (t = void 0)), k.ajax(k.extend({ url: e, type: i, dataType: r, data: t, success: n }, k.isPlainObject(e) && e));
            };
        }),
        (k._evalUrl = function (e, t) {
            return k.ajax({
                url: e,
                type: "GET",
                dataType: "script",
                cache: !0,
                async: !1,
                global: !1,
                converters: { "text script": function () {} },
                dataFilter: function (e) {
                    k.globalEval(e, t);
                },
            });
        }),
        k.fn.extend({
            wrapAll: function (e) {
                var t;
                return (
                    this[0] &&
                        (m(e) && (e = e.call(this[0])),
                        (t = k(e, this[0].ownerDocument).eq(0).clone(!0)),
                        this[0].parentNode && t.insertBefore(this[0]),
                        t
                            .map(function () {
                                var e = this;
                                while (e.firstElementChild) e = e.firstElementChild;
                                return e;
                            })
                            .append(this)),
                    this
                );
            },
            wrapInner: function (n) {
                return m(n)
                    ? this.each(function (e) {
                          k(this).wrapInner(n.call(this, e));
                      })
                    : this.each(function () {
                          var e = k(this),
                              t = e.contents();
                          t.length ? t.wrapAll(n) : e.append(n);
                      });
            },
            wrap: function (t) {
                var n = m(t);
                return this.each(function (e) {
                    k(this).wrapAll(n ? t.call(this, e) : t);
                });
            },
            unwrap: function (e) {
                return (
                    this.parent(e)
                        .not("body")
                        .each(function () {
                            k(this).replaceWith(this.childNodes);
                        }),
                    this
                );
            },
        }),
        (k.expr.pseudos.hidden = function (e) {
            return !k.expr.pseudos.visible(e);
        }),
        (k.expr.pseudos.visible = function (e) {
            return !!(e.offsetWidth || e.offsetHeight || e.getClientRects().length);
        }),
        (k.ajaxSettings.xhr = function () {
            try {
                return new C.XMLHttpRequest();
            } catch (e) {}
        });
    var Ut = { 0: 200, 1223: 204 },
        Xt = k.ajaxSettings.xhr();
    (y.cors = !!Xt && "withCredentials" in Xt),
        (y.ajax = Xt = !!Xt),
        k.ajaxTransport(function (i) {
            var o, a;
            if (y.cors || (Xt && !i.crossDomain))
                return {
                    send: function (e, t) {
                        var n,
                            r = i.xhr();
                        if ((r.open(i.type, i.url, i.async, i.username, i.password), i.xhrFields)) for (n in i.xhrFields) r[n] = i.xhrFields[n];
                        for (n in (i.mimeType && r.overrideMimeType && r.overrideMimeType(i.mimeType), i.crossDomain || e["X-Requested-With"] || (e["X-Requested-With"] = "XMLHttpRequest"), e)) r.setRequestHeader(n, e[n]);
                        (o = function (e) {
                            return function () {
                                o &&
                                    ((o = a = r.onload = r.onerror = r.onabort = r.ontimeout = r.onreadystatechange = null),
                                    "abort" === e
                                        ? r.abort()
                                        : "error" === e
                                        ? "number" != typeof r.status
                                            ? t(0, "error")
                                            : t(r.status, r.statusText)
                                        : t(Ut[r.status] || r.status, r.statusText, "text" !== (r.responseType || "text") || "string" != typeof r.responseText ? { binary: r.response } : { text: r.responseText }, r.getAllResponseHeaders()));
                            };
                        }),
                            (r.onload = o()),
                            (a = r.onerror = r.ontimeout = o("error")),
                            void 0 !== r.onabort
                                ? (r.onabort = a)
                                : (r.onreadystatechange = function () {
                                      4 === r.readyState &&
                                          C.setTimeout(function () {
                                              o && a();
                                          });
                                  }),
                            (o = o("abort"));
                        try {
                            r.send((i.hasContent && i.data) || null);
                        } catch (e) {
                            if (o) throw e;
                        }
                    },
                    abort: function () {
                        o && o();
                    },
                };
        }),
        k.ajaxPrefilter(function (e) {
            e.crossDomain && (e.contents.script = !1);
        }),
        k.ajaxSetup({
            accepts: { script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript" },
            contents: { script: /\b(?:java|ecma)script\b/ },
            converters: {
                "text script": function (e) {
                    return k.globalEval(e), e;
                },
            },
        }),
        k.ajaxPrefilter("script", function (e) {
            void 0 === e.cache && (e.cache = !1), e.crossDomain && (e.type = "GET");
        }),
        k.ajaxTransport("script", function (n) {
            var r, i;
            if (n.crossDomain || n.scriptAttrs)
                return {
                    send: function (e, t) {
                        (r = k("<script>")
                            .attr(n.scriptAttrs || {})
                            .prop({ charset: n.scriptCharset, src: n.url })
                            .on(
                                "load error",
                                (i = function (e) {
                                    r.remove(), (i = null), e && t("error" === e.type ? 404 : 200, e.type);
                                })
                            )),
                            E.head.appendChild(r[0]);
                    },
                    abort: function () {
                        i && i();
                    },
                };
        });
    var Vt,
        Gt = [],
        Yt = /(=)\?(?=&|$)|\?\?/;
    k.ajaxSetup({
        jsonp: "callback",
        jsonpCallback: function () {
            var e = Gt.pop() || k.expando + "_" + kt++;
            return (this[e] = !0), e;
        },
    }),
        k.ajaxPrefilter("json jsonp", function (e, t, n) {
            var r,
                i,
                o,
                a = !1 !== e.jsonp && (Yt.test(e.url) ? "url" : "string" == typeof e.data && 0 === (e.contentType || "").indexOf("application/x-www-form-urlencoded") && Yt.test(e.data) && "data");
            if (a || "jsonp" === e.dataTypes[0])
                return (
                    (r = e.jsonpCallback = m(e.jsonpCallback) ? e.jsonpCallback() : e.jsonpCallback),
                    a ? (e[a] = e[a].replace(Yt, "$1" + r)) : !1 !== e.jsonp && (e.url += (St.test(e.url) ? "&" : "?") + e.jsonp + "=" + r),
                    (e.converters["script json"] = function () {
                        return o || k.error(r + " was not called"), o[0];
                    }),
                    (e.dataTypes[0] = "json"),
                    (i = C[r]),
                    (C[r] = function () {
                        o = arguments;
                    }),
                    n.always(function () {
                        void 0 === i ? k(C).removeProp(r) : (C[r] = i), e[r] && ((e.jsonpCallback = t.jsonpCallback), Gt.push(r)), o && m(i) && i(o[0]), (o = i = void 0);
                    }),
                    "script"
                );
        }),
        (y.createHTMLDocument = (((Vt = E.implementation.createHTMLDocument("").body).innerHTML = "<form></form><form></form>"), 2 === Vt.childNodes.length)),
        (k.parseHTML = function (e, t, n) {
            return "string" != typeof e
                ? []
                : ("boolean" == typeof t && ((n = t), (t = !1)),
                  t || (y.createHTMLDocument ? (((r = (t = E.implementation.createHTMLDocument("")).createElement("base")).href = E.location.href), t.head.appendChild(r)) : (t = E)),
                  (o = !n && []),
                  (i = D.exec(e)) ? [t.createElement(i[1])] : ((i = we([e], t, o)), o && o.length && k(o).remove(), k.merge([], i.childNodes)));
            var r, i, o;
        }),
        (k.fn.load = function (e, t, n) {
            var r,
                i,
                o,
                a = this,
                s = e.indexOf(" ");
            return (
                -1 < s && ((r = mt(e.slice(s))), (e = e.slice(0, s))),
                m(t) ? ((n = t), (t = void 0)) : t && "object" == typeof t && (i = "POST"),
                0 < a.length &&
                    k
                        .ajax({ url: e, type: i || "GET", dataType: "html", data: t })
                        .done(function (e) {
                            (o = arguments), a.html(r ? k("<div>").append(k.parseHTML(e)).find(r) : e);
                        })
                        .always(
                            n &&
                                function (e, t) {
                                    a.each(function () {
                                        n.apply(this, o || [e.responseText, t, e]);
                                    });
                                }
                        ),
                this
            );
        }),
        k.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function (e, t) {
            k.fn[t] = function (e) {
                return this.on(t, e);
            };
        }),
        (k.expr.pseudos.animated = function (t) {
            return k.grep(k.timers, function (e) {
                return t === e.elem;
            }).length;
        }),
        (k.offset = {
            setOffset: function (e, t, n) {
                var r,
                    i,
                    o,
                    a,
                    s,
                    u,
                    l = k.css(e, "position"),
                    c = k(e),
                    f = {};
                "static" === l && (e.style.position = "relative"),
                    (s = c.offset()),
                    (o = k.css(e, "top")),
                    (u = k.css(e, "left")),
                    ("absolute" === l || "fixed" === l) && -1 < (o + u).indexOf("auto") ? ((a = (r = c.position()).top), (i = r.left)) : ((a = parseFloat(o) || 0), (i = parseFloat(u) || 0)),
                    m(t) && (t = t.call(e, n, k.extend({}, s))),
                    null != t.top && (f.top = t.top - s.top + a),
                    null != t.left && (f.left = t.left - s.left + i),
                    "using" in t ? t.using.call(e, f) : c.css(f);
            },
        }),
        k.fn.extend({
            offset: function (t) {
                if (arguments.length)
                    return void 0 === t
                        ? this
                        : this.each(function (e) {
                              k.offset.setOffset(this, t, e);
                          });
                var e,
                    n,
                    r = this[0];
                return r ? (r.getClientRects().length ? ((e = r.getBoundingClientRect()), (n = r.ownerDocument.defaultView), { top: e.top + n.pageYOffset, left: e.left + n.pageXOffset }) : { top: 0, left: 0 }) : void 0;
            },
            position: function () {
                if (this[0]) {
                    var e,
                        t,
                        n,
                        r = this[0],
                        i = { top: 0, left: 0 };
                    if ("fixed" === k.css(r, "position")) t = r.getBoundingClientRect();
                    else {
                        (t = this.offset()), (n = r.ownerDocument), (e = r.offsetParent || n.documentElement);
                        while (e && (e === n.body || e === n.documentElement) && "static" === k.css(e, "position")) e = e.parentNode;
                        e && e !== r && 1 === e.nodeType && (((i = k(e).offset()).top += k.css(e, "borderTopWidth", !0)), (i.left += k.css(e, "borderLeftWidth", !0)));
                    }
                    return { top: t.top - i.top - k.css(r, "marginTop", !0), left: t.left - i.left - k.css(r, "marginLeft", !0) };
                }
            },
            offsetParent: function () {
                return this.map(function () {
                    var e = this.offsetParent;
                    while (e && "static" === k.css(e, "position")) e = e.offsetParent;
                    return e || ie;
                });
            },
        }),
        k.each({ scrollLeft: "pageXOffset", scrollTop: "pageYOffset" }, function (t, i) {
            var o = "pageYOffset" === i;
            k.fn[t] = function (e) {
                return _(
                    this,
                    function (e, t, n) {
                        var r;
                        if ((x(e) ? (r = e) : 9 === e.nodeType && (r = e.defaultView), void 0 === n)) return r ? r[i] : e[t];
                        r ? r.scrollTo(o ? r.pageXOffset : n, o ? n : r.pageYOffset) : (e[t] = n);
                    },
                    t,
                    e,
                    arguments.length
                );
            };
        }),
        k.each(["top", "left"], function (e, n) {
            k.cssHooks[n] = ze(y.pixelPosition, function (e, t) {
                if (t) return (t = _e(e, n)), $e.test(t) ? k(e).position()[n] + "px" : t;
            });
        }),
        k.each({ Height: "height", Width: "width" }, function (a, s) {
            k.each({ padding: "inner" + a, content: s, "": "outer" + a }, function (r, o) {
                k.fn[o] = function (e, t) {
                    var n = arguments.length && (r || "boolean" != typeof e),
                        i = r || (!0 === e || !0 === t ? "margin" : "border");
                    return _(
                        this,
                        function (e, t, n) {
                            var r;
                            return x(e)
                                ? 0 === o.indexOf("outer")
                                    ? e["inner" + a]
                                    : e.document.documentElement["client" + a]
                                : 9 === e.nodeType
                                ? ((r = e.documentElement), Math.max(e.body["scroll" + a], r["scroll" + a], e.body["offset" + a], r["offset" + a], r["client" + a]))
                                : void 0 === n
                                ? k.css(e, t, i)
                                : k.style(e, t, n, i);
                        },
                        s,
                        n ? e : void 0,
                        n
                    );
                };
            });
        }),
        k.each("blur focus focusin focusout resize scroll click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup contextmenu".split(" "), function (e, n) {
            k.fn[n] = function (e, t) {
                return 0 < arguments.length ? this.on(n, null, e, t) : this.trigger(n);
            };
        }),
        k.fn.extend({
            hover: function (e, t) {
                return this.mouseenter(e).mouseleave(t || e);
            },
        }),
        k.fn.extend({
            bind: function (e, t, n) {
                return this.on(e, null, t, n);
            },
            unbind: function (e, t) {
                return this.off(e, null, t);
            },
            delegate: function (e, t, n, r) {
                return this.on(t, e, n, r);
            },
            undelegate: function (e, t, n) {
                return 1 === arguments.length ? this.off(e, "**") : this.off(t, e || "**", n);
            },
        }),
        (k.proxy = function (e, t) {
            var n, r, i;
            if (("string" == typeof t && ((n = e[t]), (t = e), (e = n)), m(e)))
                return (
                    (r = s.call(arguments, 2)),
                    ((i = function () {
                        return e.apply(t || this, r.concat(s.call(arguments)));
                    }).guid = e.guid = e.guid || k.guid++),
                    i
                );
        }),
        (k.holdReady = function (e) {
            e ? k.readyWait++ : k.ready(!0);
        }),
        (k.isArray = Array.isArray),
        (k.parseJSON = JSON.parse),
        (k.nodeName = A),
        (k.isFunction = m),
        (k.isWindow = x),
        (k.camelCase = V),
        (k.type = w),
        (k.now = Date.now),
        (k.isNumeric = function (e) {
            var t = k.type(e);
            return ("number" === t || "string" === t) && !isNaN(e - parseFloat(e));
        }),
        "function" == typeof define &&
            define.amd &&
            define("jquery", [], function () {
                return k;
            });
    var Qt = C.jQuery,
        Jt = C.$;
    return (
        (k.noConflict = function (e) {
            return C.$ === k && (C.$ = Jt), e && C.jQuery === k && (C.jQuery = Qt), k;
        }),
        e || (C.jQuery = C.$ = k),
        k
    );
});

/*!
 * Bootstrap v5.0.0-beta1 (https://getbootstrap.com/)
 * Copyright 2011-2020 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
 */
!(function (t, e) {
    "object" == typeof exports && "undefined" != typeof module ? (module.exports = e()) : "function" == typeof define && define.amd ? define(e) : ((t = "undefined" != typeof globalThis ? globalThis : t || self).bootstrap = e());
})(this, function () {
    "use strict";
    function t(t, e) {
        for (var n = 0; n < e.length; n++) {
            var i = e[n];
            (i.enumerable = i.enumerable || !1), (i.configurable = !0), "value" in i && (i.writable = !0), Object.defineProperty(t, i.key, i);
        }
    }
    function e(e, n, i) {
        return n && t(e.prototype, n), i && t(e, i), e;
    }
    function n() {
        return (n =
            Object.assign ||
            function (t) {
                for (var e = 1; e < arguments.length; e++) {
                    var n = arguments[e];
                    for (var i in n) Object.prototype.hasOwnProperty.call(n, i) && (t[i] = n[i]);
                }
                return t;
            }).apply(this, arguments);
    }
    function i(t, e) {
        (t.prototype = Object.create(e.prototype)), (t.prototype.constructor = t), (t.__proto__ = e);
    }
    var o,
        r,
        s = function (t) {
            do {
                t += Math.floor(1e6 * Math.random());
            } while (document.getElementById(t));
            return t;
        },
        a = function (t) {
            var e = t.getAttribute("data-bs-target");
            if (!e || "#" === e) {
                var n = t.getAttribute("href");
                e = n && "#" !== n ? n.trim() : null;
            }
            return e;
        },
        l = function (t) {
            var e = a(t);
            return e && document.querySelector(e) ? e : null;
        },
        c = function (t) {
            var e = a(t);
            return e ? document.querySelector(e) : null;
        },
        u = function (t) {
            if (!t) return 0;
            var e = window.getComputedStyle(t),
                n = e.transitionDuration,
                i = e.transitionDelay,
                o = Number.parseFloat(n),
                r = Number.parseFloat(i);
            return o || r ? ((n = n.split(",")[0]), (i = i.split(",")[0]), 1e3 * (Number.parseFloat(n) + Number.parseFloat(i))) : 0;
        },
        f = function (t) {
            t.dispatchEvent(new Event("transitionend"));
        },
        d = function (t) {
            return (t[0] || t).nodeType;
        },
        h = function (t, e) {
            var n = !1,
                i = e + 5;
            t.addEventListener("transitionend", function e() {
                (n = !0), t.removeEventListener("transitionend", e);
            }),
                setTimeout(function () {
                    n || f(t);
                }, i);
        },
        p = function (t, e, n) {
            Object.keys(n).forEach(function (i) {
                var o,
                    r = n[i],
                    s = e[i],
                    a =
                        s && d(s)
                            ? "element"
                            : null == (o = s)
                            ? "" + o
                            : {}.toString
                                  .call(o)
                                  .match(/\s([a-z]+)/i)[1]
                                  .toLowerCase();
                if (!new RegExp(r).test(a)) throw new Error(t.toUpperCase() + ': Option "' + i + '" provided type "' + a + '" but expected type "' + r + '".');
            });
        },
        g = function (t) {
            if (!t) return !1;
            if (t.style && t.parentNode && t.parentNode.style) {
                var e = getComputedStyle(t),
                    n = getComputedStyle(t.parentNode);
                return "none" !== e.display && "none" !== n.display && "hidden" !== e.visibility;
            }
            return !1;
        },
        m = function () {
            return function () {};
        },
        v = function (t) {
            return t.offsetHeight;
        },
        _ = function () {
            var t = window.jQuery;
            return t && !document.body.hasAttribute("data-bs-no-jquery") ? t : null;
        },
        b = function (t) {
            "loading" === document.readyState ? document.addEventListener("DOMContentLoaded", t) : t();
        },
        y = "rtl" === document.documentElement.dir,
        w =
            ((o = {}),
            (r = 1),
            {
                set: function (t, e, n) {
                    void 0 === t.bsKey && ((t.bsKey = { key: e, id: r }), r++), (o[t.bsKey.id] = n);
                },
                get: function (t, e) {
                    if (!t || void 0 === t.bsKey) return null;
                    var n = t.bsKey;
                    return n.key === e ? o[n.id] : null;
                },
                delete: function (t, e) {
                    if (void 0 !== t.bsKey) {
                        var n = t.bsKey;
                        n.key === e && (delete o[n.id], delete t.bsKey);
                    }
                },
            }),
        E = function (t, e, n) {
            w.set(t, e, n);
        },
        T = function (t, e) {
            return w.get(t, e);
        },
        k = function (t, e) {
            w.delete(t, e);
        },
        O = /[^.]*(?=\..*)\.|.*/,
        L = /\..*/,
        A = /::\d+$/,
        C = {},
        D = 1,
        x = { mouseenter: "mouseover", mouseleave: "mouseout" },
        S = new Set([
            "click",
            "dblclick",
            "mouseup",
            "mousedown",
            "contextmenu",
            "mousewheel",
            "DOMMouseScroll",
            "mouseover",
            "mouseout",
            "mousemove",
            "selectstart",
            "selectend",
            "keydown",
            "keypress",
            "keyup",
            "orientationchange",
            "touchstart",
            "touchmove",
            "touchend",
            "touchcancel",
            "pointerdown",
            "pointermove",
            "pointerup",
            "pointerleave",
            "pointercancel",
            "gesturestart",
            "gesturechange",
            "gestureend",
            "focus",
            "blur",
            "change",
            "reset",
            "select",
            "submit",
            "focusin",
            "focusout",
            "load",
            "unload",
            "beforeunload",
            "resize",
            "move",
            "DOMContentLoaded",
            "readystatechange",
            "error",
            "abort",
            "scroll",
        ]);
    function j(t, e) {
        return (e && e + "::" + D++) || t.uidEvent || D++;
    }
    function N(t) {
        var e = j(t);
        return (t.uidEvent = e), (C[e] = C[e] || {}), C[e];
    }
    function I(t, e, n) {
        void 0 === n && (n = null);
        for (var i = Object.keys(t), o = 0, r = i.length; o < r; o++) {
            var s = t[i[o]];
            if (s.originalHandler === e && s.delegationSelector === n) return s;
        }
        return null;
    }
    function P(t, e, n) {
        var i = "string" == typeof e,
            o = i ? n : e,
            r = t.replace(L, ""),
            s = x[r];
        return s && (r = s), S.has(r) || (r = t), [i, o, r];
    }
    function M(t, e, n, i, o) {
        if ("string" == typeof e && t) {
            n || ((n = i), (i = null));
            var r = P(e, n, i),
                s = r[0],
                a = r[1],
                l = r[2],
                c = N(t),
                u = c[l] || (c[l] = {}),
                f = I(u, a, s ? n : null);
            if (f) f.oneOff = f.oneOff && o;
            else {
                var d = j(a, e.replace(O, "")),
                    h = s
                        ? (function (t, e, n) {
                              return function i(o) {
                                  for (var r = t.querySelectorAll(e), s = o.target; s && s !== this; s = s.parentNode)
                                      for (var a = r.length; a--; ) if (r[a] === s) return (o.delegateTarget = s), i.oneOff && H.off(t, o.type, n), n.apply(s, [o]);
                                  return null;
                              };
                          })(t, n, i)
                        : (function (t, e) {
                              return function n(i) {
                                  return (i.delegateTarget = t), n.oneOff && H.off(t, i.type, e), e.apply(t, [i]);
                              };
                          })(t, n);
                (h.delegationSelector = s ? n : null), (h.originalHandler = a), (h.oneOff = o), (h.uidEvent = d), (u[d] = h), t.addEventListener(l, h, s);
            }
        }
    }
    function B(t, e, n, i, o) {
        var r = I(e[n], i, o);
        r && (t.removeEventListener(n, r, Boolean(o)), delete e[n][r.uidEvent]);
    }
    var H = {
            on: function (t, e, n, i) {
                M(t, e, n, i, !1);
            },
            one: function (t, e, n, i) {
                M(t, e, n, i, !0);
            },
            off: function (t, e, n, i) {
                if ("string" == typeof e && t) {
                    var o = P(e, n, i),
                        r = o[0],
                        s = o[1],
                        a = o[2],
                        l = a !== e,
                        c = N(t),
                        u = e.startsWith(".");
                    if (void 0 === s) {
                        u &&
                            Object.keys(c).forEach(function (n) {
                                !(function (t, e, n, i) {
                                    var o = e[n] || {};
                                    Object.keys(o).forEach(function (r) {
                                        if (r.includes(i)) {
                                            var s = o[r];
                                            B(t, e, n, s.originalHandler, s.delegationSelector);
                                        }
                                    });
                                })(t, c, n, e.slice(1));
                            });
                        var f = c[a] || {};
                        Object.keys(f).forEach(function (n) {
                            var i = n.replace(A, "");
                            if (!l || e.includes(i)) {
                                var o = f[n];
                                B(t, c, a, o.originalHandler, o.delegationSelector);
                            }
                        });
                    } else {
                        if (!c || !c[a]) return;
                        B(t, c, a, s, r ? n : null);
                    }
                }
            },
            trigger: function (t, e, n) {
                if ("string" != typeof e || !t) return null;
                var i,
                    o = _(),
                    r = e.replace(L, ""),
                    s = e !== r,
                    a = S.has(r),
                    l = !0,
                    c = !0,
                    u = !1,
                    f = null;
                return (
                    s && o && ((i = o.Event(e, n)), o(t).trigger(i), (l = !i.isPropagationStopped()), (c = !i.isImmediatePropagationStopped()), (u = i.isDefaultPrevented())),
                    a ? (f = document.createEvent("HTMLEvents")).initEvent(r, l, !0) : (f = new CustomEvent(e, { bubbles: l, cancelable: !0 })),
                    void 0 !== n &&
                        Object.keys(n).forEach(function (t) {
                            Object.defineProperty(f, t, {
                                get: function () {
                                    return n[t];
                                },
                            });
                        }),
                    u && f.preventDefault(),
                    c && t.dispatchEvent(f),
                    f.defaultPrevented && void 0 !== i && i.preventDefault(),
                    f
                );
            },
        },
        R = (function () {
            function t(t) {
                t && ((this._element = t), E(t, this.constructor.DATA_KEY, this));
            }
            return (
                (t.prototype.dispose = function () {
                    k(this._element, this.constructor.DATA_KEY), (this._element = null);
                }),
                (t.getInstance = function (t) {
                    return T(t, this.DATA_KEY);
                }),
                e(t, null, [
                    {
                        key: "VERSION",
                        get: function () {
                            return "5.0.0-beta1";
                        },
                    },
                ]),
                t
            );
        })(),
        W = "alert",
        K = (function (t) {
            function n() {
                return t.apply(this, arguments) || this;
            }
            i(n, t);
            var o = n.prototype;
            return (
                (o.close = function (t) {
                    var e = t ? this._getRootElement(t) : this._element,
                        n = this._triggerCloseEvent(e);
                    null === n || n.defaultPrevented || this._removeElement(e);
                }),
                (o._getRootElement = function (t) {
                    return c(t) || t.closest(".alert");
                }),
                (o._triggerCloseEvent = function (t) {
                    return H.trigger(t, "close.bs.alert");
                }),
                (o._removeElement = function (t) {
                    var e = this;
                    if ((t.classList.remove("show"), t.classList.contains("fade"))) {
                        var n = u(t);
                        H.one(t, "transitionend", function () {
                            return e._destroyElement(t);
                        }),
                            h(t, n);
                    } else this._destroyElement(t);
                }),
                (o._destroyElement = function (t) {
                    t.parentNode && t.parentNode.removeChild(t), H.trigger(t, "closed.bs.alert");
                }),
                (n.jQueryInterface = function (t) {
                    return this.each(function () {
                        var e = T(this, "bs.alert");
                        e || (e = new n(this)), "close" === t && e[t](this);
                    });
                }),
                (n.handleDismiss = function (t) {
                    return function (e) {
                        e && e.preventDefault(), t.close(this);
                    };
                }),
                e(n, null, [
                    {
                        key: "DATA_KEY",
                        get: function () {
                            return "bs.alert";
                        },
                    },
                ]),
                n
            );
        })(R);
    H.on(document, "click.bs.alert.data-api", '[data-bs-dismiss="alert"]', K.handleDismiss(new K())),
        b(function () {
            var t = _();
            if (t) {
                var e = t.fn[W];
                (t.fn[W] = K.jQueryInterface),
                    (t.fn[W].Constructor = K),
                    (t.fn[W].noConflict = function () {
                        return (t.fn[W] = e), K.jQueryInterface;
                    });
            }
        });
    var Q = (function (t) {
        function n() {
            return t.apply(this, arguments) || this;
        }
        return (
            i(n, t),
            (n.prototype.toggle = function () {
                this._element.setAttribute("aria-pressed", this._element.classList.toggle("active"));
            }),
            (n.jQueryInterface = function (t) {
                return this.each(function () {
                    var e = T(this, "bs.button");
                    e || (e = new n(this)), "toggle" === t && e[t]();
                });
            }),
            e(n, null, [
                {
                    key: "DATA_KEY",
                    get: function () {
                        return "bs.button";
                    },
                },
            ]),
            n
        );
    })(R);
    function U(t) {
        return "true" === t || ("false" !== t && (t === Number(t).toString() ? Number(t) : "" === t || "null" === t ? null : t));
    }
    function F(t) {
        return t.replace(/[A-Z]/g, function (t) {
            return "-" + t.toLowerCase();
        });
    }
    H.on(document, "click.bs.button.data-api", '[data-bs-toggle="button"]', function (t) {
        t.preventDefault();
        var e = t.target.closest('[data-bs-toggle="button"]'),
            n = T(e, "bs.button");
        n || (n = new Q(e)), n.toggle();
    }),
        b(function () {
            var t = _();
            if (t) {
                var e = t.fn.button;
                (t.fn.button = Q.jQueryInterface),
                    (t.fn.button.Constructor = Q),
                    (t.fn.button.noConflict = function () {
                        return (t.fn.button = e), Q.jQueryInterface;
                    });
            }
        });
    var Y = {
            setDataAttribute: function (t, e, n) {
                t.setAttribute("data-bs-" + F(e), n);
            },
            removeDataAttribute: function (t, e) {
                t.removeAttribute("data-bs-" + F(e));
            },
            getDataAttributes: function (t) {
                if (!t) return {};
                var e = {};
                return (
                    Object.keys(t.dataset)
                        .filter(function (t) {
                            return t.startsWith("bs");
                        })
                        .forEach(function (n) {
                            var i = n.replace(/^bs/, "");
                            (i = i.charAt(0).toLowerCase() + i.slice(1, i.length)), (e[i] = U(t.dataset[n]));
                        }),
                    e
                );
            },
            getDataAttribute: function (t, e) {
                return U(t.getAttribute("data-bs-" + F(e)));
            },
            offset: function (t) {
                var e = t.getBoundingClientRect();
                return { top: e.top + document.body.scrollTop, left: e.left + document.body.scrollLeft };
            },
            position: function (t) {
                return { top: t.offsetTop, left: t.offsetLeft };
            },
        },
        q = {
            matches: function (t, e) {
                return t.matches(e);
            },
            find: function (t, e) {
                var n;
                return void 0 === e && (e = document.documentElement), (n = []).concat.apply(n, Element.prototype.querySelectorAll.call(e, t));
            },
            findOne: function (t, e) {
                return void 0 === e && (e = document.documentElement), Element.prototype.querySelector.call(e, t);
            },
            children: function (t, e) {
                var n,
                    i = (n = []).concat.apply(n, t.children);
                return i.filter(function (t) {
                    return t.matches(e);
                });
            },
            parents: function (t, e) {
                for (var n = [], i = t.parentNode; i && i.nodeType === Node.ELEMENT_NODE && 3 !== i.nodeType; ) this.matches(i, e) && n.push(i), (i = i.parentNode);
                return n;
            },
            prev: function (t, e) {
                for (var n = t.previousElementSibling; n; ) {
                    if (n.matches(e)) return [n];
                    n = n.previousElementSibling;
                }
                return [];
            },
            next: function (t, e) {
                for (var n = t.nextElementSibling; n; ) {
                    if (this.matches(n, e)) return [n];
                    n = n.nextElementSibling;
                }
                return [];
            },
        },
        z = "carousel",
        V = ".bs.carousel",
        X = { interval: 5e3, keyboard: !0, slide: !1, pause: "hover", wrap: !0, touch: !0 },
        $ = { interval: "(number|boolean)", keyboard: "boolean", slide: "(boolean|string)", pause: "(string|boolean)", wrap: "boolean", touch: "boolean" },
        G = { TOUCH: "touch", PEN: "pen" },
        Z = (function (t) {
            function o(e, n) {
                var i;
                return (
                    ((i = t.call(this, e) || this)._items = null),
                    (i._interval = null),
                    (i._activeElement = null),
                    (i._isPaused = !1),
                    (i._isSliding = !1),
                    (i.touchTimeout = null),
                    (i.touchStartX = 0),
                    (i.touchDeltaX = 0),
                    (i._config = i._getConfig(n)),
                    (i._indicatorsElement = q.findOne(".carousel-indicators", i._element)),
                    (i._touchSupported = "ontouchstart" in document.documentElement || navigator.maxTouchPoints > 0),
                    (i._pointerEvent = Boolean(window.PointerEvent)),
                    i._addEventListeners(),
                    i
                );
            }
            i(o, t);
            var r = o.prototype;
            return (
                (r.next = function () {
                    this._isSliding || this._slide("next");
                }),
                (r.nextWhenVisible = function () {
                    !document.hidden && g(this._element) && this.next();
                }),
                (r.prev = function () {
                    this._isSliding || this._slide("prev");
                }),
                (r.pause = function (t) {
                    t || (this._isPaused = !0), q.findOne(".carousel-item-next, .carousel-item-prev", this._element) && (f(this._element), this.cycle(!0)), clearInterval(this._interval), (this._interval = null);
                }),
                (r.cycle = function (t) {
                    t || (this._isPaused = !1),
                        this._interval && (clearInterval(this._interval), (this._interval = null)),
                        this._config && this._config.interval && !this._isPaused && (this._updateInterval(), (this._interval = setInterval((document.visibilityState ? this.nextWhenVisible : this.next).bind(this), this._config.interval)));
                }),
                (r.to = function (t) {
                    var e = this;
                    this._activeElement = q.findOne(".active.carousel-item", this._element);
                    var n = this._getItemIndex(this._activeElement);
                    if (!(t > this._items.length - 1 || t < 0))
                        if (this._isSliding)
                            H.one(this._element, "slid.bs.carousel", function () {
                                return e.to(t);
                            });
                        else {
                            if (n === t) return this.pause(), void this.cycle();
                            var i = t > n ? "next" : "prev";
                            this._slide(i, this._items[t]);
                        }
                }),
                (r.dispose = function () {
                    t.prototype.dispose.call(this),
                        H.off(this._element, V),
                        (this._items = null),
                        (this._config = null),
                        (this._interval = null),
                        (this._isPaused = null),
                        (this._isSliding = null),
                        (this._activeElement = null),
                        (this._indicatorsElement = null);
                }),
                (r._getConfig = function (t) {
                    return (t = n({}, X, t)), p(z, t, $), t;
                }),
                (r._handleSwipe = function () {
                    var t = Math.abs(this.touchDeltaX);
                    if (!(t <= 40)) {
                        var e = t / this.touchDeltaX;
                        (this.touchDeltaX = 0), e > 0 && this.prev(), e < 0 && this.next();
                    }
                }),
                (r._addEventListeners = function () {
                    var t = this;
                    this._config.keyboard &&
                        H.on(this._element, "keydown.bs.carousel", function (e) {
                            return t._keydown(e);
                        }),
                        "hover" === this._config.pause &&
                            (H.on(this._element, "mouseenter.bs.carousel", function (e) {
                                return t.pause(e);
                            }),
                            H.on(this._element, "mouseleave.bs.carousel", function (e) {
                                return t.cycle(e);
                            })),
                        this._config.touch && this._touchSupported && this._addTouchEventListeners();
                }),
                (r._addTouchEventListeners = function () {
                    var t = this,
                        e = function (e) {
                            t._pointerEvent && G[e.pointerType.toUpperCase()] ? (t.touchStartX = e.clientX) : t._pointerEvent || (t.touchStartX = e.touches[0].clientX);
                        },
                        n = function (e) {
                            t._pointerEvent && G[e.pointerType.toUpperCase()] && (t.touchDeltaX = e.clientX - t.touchStartX),
                                t._handleSwipe(),
                                "hover" === t._config.pause &&
                                    (t.pause(),
                                    t.touchTimeout && clearTimeout(t.touchTimeout),
                                    (t.touchTimeout = setTimeout(function (e) {
                                        return t.cycle(e);
                                    }, 500 + t._config.interval)));
                        };
                    q.find(".carousel-item img", this._element).forEach(function (t) {
                        H.on(t, "dragstart.bs.carousel", function (t) {
                            return t.preventDefault();
                        });
                    }),
                        this._pointerEvent
                            ? (H.on(this._element, "pointerdown.bs.carousel", function (t) {
                                  return e(t);
                              }),
                              H.on(this._element, "pointerup.bs.carousel", function (t) {
                                  return n(t);
                              }),
                              this._element.classList.add("pointer-event"))
                            : (H.on(this._element, "touchstart.bs.carousel", function (t) {
                                  return e(t);
                              }),
                              H.on(this._element, "touchmove.bs.carousel", function (e) {
                                  return (function (e) {
                                      e.touches && e.touches.length > 1 ? (t.touchDeltaX = 0) : (t.touchDeltaX = e.touches[0].clientX - t.touchStartX);
                                  })(e);
                              }),
                              H.on(this._element, "touchend.bs.carousel", function (t) {
                                  return n(t);
                              }));
                }),
                (r._keydown = function (t) {
                    if (!/input|textarea/i.test(t.target.tagName))
                        switch (t.key) {
                            case "ArrowLeft":
                                t.preventDefault(), this.prev();
                                break;
                            case "ArrowRight":
                                t.preventDefault(), this.next();
                        }
                }),
                (r._getItemIndex = function (t) {
                    return (this._items = t && t.parentNode ? q.find(".carousel-item", t.parentNode) : []), this._items.indexOf(t);
                }),
                (r._getItemByDirection = function (t, e) {
                    var n = "next" === t,
                        i = "prev" === t,
                        o = this._getItemIndex(e),
                        r = this._items.length - 1;
                    if (((i && 0 === o) || (n && o === r)) && !this._config.wrap) return e;
                    var s = (o + ("prev" === t ? -1 : 1)) % this._items.length;
                    return -1 === s ? this._items[this._items.length - 1] : this._items[s];
                }),
                (r._triggerSlideEvent = function (t, e) {
                    var n = this._getItemIndex(t),
                        i = this._getItemIndex(q.findOne(".active.carousel-item", this._element));
                    return H.trigger(this._element, "slide.bs.carousel", { relatedTarget: t, direction: e, from: i, to: n });
                }),
                (r._setActiveIndicatorElement = function (t) {
                    if (this._indicatorsElement) {
                        for (var e = q.find(".active", this._indicatorsElement), n = 0; n < e.length; n++) e[n].classList.remove("active");
                        var i = this._indicatorsElement.children[this._getItemIndex(t)];
                        i && i.classList.add("active");
                    }
                }),
                (r._updateInterval = function () {
                    var t = this._activeElement || q.findOne(".active.carousel-item", this._element);
                    if (t) {
                        var e = Number.parseInt(t.getAttribute("data-bs-interval"), 10);
                        e ? ((this._config.defaultInterval = this._config.defaultInterval || this._config.interval), (this._config.interval = e)) : (this._config.interval = this._config.defaultInterval || this._config.interval);
                    }
                }),
                (r._slide = function (t, e) {
                    var n,
                        i,
                        o,
                        r = this,
                        s = q.findOne(".active.carousel-item", this._element),
                        a = this._getItemIndex(s),
                        l = e || (s && this._getItemByDirection(t, s)),
                        c = this._getItemIndex(l),
                        f = Boolean(this._interval);
                    if (("next" === t ? ((n = "carousel-item-start"), (i = "carousel-item-next"), (o = "left")) : ((n = "carousel-item-end"), (i = "carousel-item-prev"), (o = "right")), l && l.classList.contains("active")))
                        this._isSliding = !1;
                    else if (!this._triggerSlideEvent(l, o).defaultPrevented && s && l) {
                        if (((this._isSliding = !0), f && this.pause(), this._setActiveIndicatorElement(l), (this._activeElement = l), this._element.classList.contains("slide"))) {
                            l.classList.add(i), v(l), s.classList.add(n), l.classList.add(n);
                            var d = u(s);
                            H.one(s, "transitionend", function () {
                                l.classList.remove(n, i),
                                    l.classList.add("active"),
                                    s.classList.remove("active", i, n),
                                    (r._isSliding = !1),
                                    setTimeout(function () {
                                        H.trigger(r._element, "slid.bs.carousel", { relatedTarget: l, direction: o, from: a, to: c });
                                    }, 0);
                            }),
                                h(s, d);
                        } else s.classList.remove("active"), l.classList.add("active"), (this._isSliding = !1), H.trigger(this._element, "slid.bs.carousel", { relatedTarget: l, direction: o, from: a, to: c });
                        f && this.cycle();
                    }
                }),
                (o.carouselInterface = function (t, e) {
                    var i = T(t, "bs.carousel"),
                        r = n({}, X, Y.getDataAttributes(t));
                    "object" == typeof e && (r = n({}, r, e));
                    var s = "string" == typeof e ? e : r.slide;
                    if ((i || (i = new o(t, r)), "number" == typeof e)) i.to(e);
                    else if ("string" == typeof s) {
                        if (void 0 === i[s]) throw new TypeError('No method named "' + s + '"');
                        i[s]();
                    } else r.interval && r.ride && (i.pause(), i.cycle());
                }),
                (o.jQueryInterface = function (t) {
                    return this.each(function () {
                        o.carouselInterface(this, t);
                    });
                }),
                (o.dataApiClickHandler = function (t) {
                    var e = c(this);
                    if (e && e.classList.contains("carousel")) {
                        var i = n({}, Y.getDataAttributes(e), Y.getDataAttributes(this)),
                            r = this.getAttribute("data-bs-slide-to");
                        r && (i.interval = !1), o.carouselInterface(e, i), r && T(e, "bs.carousel").to(r), t.preventDefault();
                    }
                }),
                e(o, null, [
                    {
                        key: "Default",
                        get: function () {
                            return X;
                        },
                    },
                    {
                        key: "DATA_KEY",
                        get: function () {
                            return "bs.carousel";
                        },
                    },
                ]),
                o
            );
        })(R);
    H.on(document, "click.bs.carousel.data-api", "[data-bs-slide], [data-bs-slide-to]", Z.dataApiClickHandler),
        H.on(window, "load.bs.carousel.data-api", function () {
            for (var t = q.find('[data-bs-ride="carousel"]'), e = 0, n = t.length; e < n; e++) Z.carouselInterface(t[e], T(t[e], "bs.carousel"));
        }),
        b(function () {
            var t = _();
            if (t) {
                var e = t.fn[z];
                (t.fn[z] = Z.jQueryInterface),
                    (t.fn[z].Constructor = Z),
                    (t.fn[z].noConflict = function () {
                        return (t.fn[z] = e), Z.jQueryInterface;
                    });
            }
        });
    var J = "collapse",
        tt = { toggle: !0, parent: "" },
        et = { toggle: "boolean", parent: "(string|element)" },
        nt = (function (t) {
            function o(e, n) {
                var i;
                ((i = t.call(this, e) || this)._isTransitioning = !1),
                    (i._config = i._getConfig(n)),
                    (i._triggerArray = q.find('[data-bs-toggle="collapse"][href="#' + e.id + '"],[data-bs-toggle="collapse"][data-bs-target="#' + e.id + '"]'));
                for (var o = q.find('[data-bs-toggle="collapse"]'), r = 0, s = o.length; r < s; r++) {
                    var a = o[r],
                        c = l(a),
                        u = q.find(c).filter(function (t) {
                            return t === e;
                        });
                    null !== c && u.length && ((i._selector = c), i._triggerArray.push(a));
                }
                return (i._parent = i._config.parent ? i._getParent() : null), i._config.parent || i._addAriaAndCollapsedClass(i._element, i._triggerArray), i._config.toggle && i.toggle(), i;
            }
            i(o, t);
            var r = o.prototype;
            return (
                (r.toggle = function () {
                    this._element.classList.contains("show") ? this.hide() : this.show();
                }),
                (r.show = function () {
                    var t = this;
                    if (!this._isTransitioning && !this._element.classList.contains("show")) {
                        var e, n;
                        this._parent &&
                            0 ===
                                (e = q.find(".show, .collapsing", this._parent).filter(function (e) {
                                    return "string" == typeof t._config.parent ? e.getAttribute("data-bs-parent") === t._config.parent : e.classList.contains("collapse");
                                })).length &&
                            (e = null);
                        var i = q.findOne(this._selector);
                        if (e) {
                            var r = e.find(function (t) {
                                return i !== t;
                            });
                            if ((n = r ? T(r, "bs.collapse") : null) && n._isTransitioning) return;
                        }
                        if (!H.trigger(this._element, "show.bs.collapse").defaultPrevented) {
                            e &&
                                e.forEach(function (t) {
                                    i !== t && o.collapseInterface(t, "hide"), n || E(t, "bs.collapse", null);
                                });
                            var s = this._getDimension();
                            this._element.classList.remove("collapse"),
                                this._element.classList.add("collapsing"),
                                (this._element.style[s] = 0),
                                this._triggerArray.length &&
                                    this._triggerArray.forEach(function (t) {
                                        t.classList.remove("collapsed"), t.setAttribute("aria-expanded", !0);
                                    }),
                                this.setTransitioning(!0);
                            var a = "scroll" + (s[0].toUpperCase() + s.slice(1)),
                                l = u(this._element);
                            H.one(this._element, "transitionend", function () {
                                t._element.classList.remove("collapsing"), t._element.classList.add("collapse", "show"), (t._element.style[s] = ""), t.setTransitioning(!1), H.trigger(t._element, "shown.bs.collapse");
                            }),
                                h(this._element, l),
                                (this._element.style[s] = this._element[a] + "px");
                        }
                    }
                }),
                (r.hide = function () {
                    var t = this;
                    if (!this._isTransitioning && this._element.classList.contains("show") && !H.trigger(this._element, "hide.bs.collapse").defaultPrevented) {
                        var e = this._getDimension();
                        (this._element.style[e] = this._element.getBoundingClientRect()[e] + "px"), v(this._element), this._element.classList.add("collapsing"), this._element.classList.remove("collapse", "show");
                        var n = this._triggerArray.length;
                        if (n > 0)
                            for (var i = 0; i < n; i++) {
                                var o = this._triggerArray[i],
                                    r = c(o);
                                r && !r.classList.contains("show") && (o.classList.add("collapsed"), o.setAttribute("aria-expanded", !1));
                            }
                        this.setTransitioning(!0);
                        this._element.style[e] = "";
                        var s = u(this._element);
                        H.one(this._element, "transitionend", function () {
                            t.setTransitioning(!1), t._element.classList.remove("collapsing"), t._element.classList.add("collapse"), H.trigger(t._element, "hidden.bs.collapse");
                        }),
                            h(this._element, s);
                    }
                }),
                (r.setTransitioning = function (t) {
                    this._isTransitioning = t;
                }),
                (r.dispose = function () {
                    t.prototype.dispose.call(this), (this._config = null), (this._parent = null), (this._triggerArray = null), (this._isTransitioning = null);
                }),
                (r._getConfig = function (t) {
                    return ((t = n({}, tt, t)).toggle = Boolean(t.toggle)), p(J, t, et), t;
                }),
                (r._getDimension = function () {
                    return this._element.classList.contains("width") ? "width" : "height";
                }),
                (r._getParent = function () {
                    var t = this,
                        e = this._config.parent;
                    d(e) ? (void 0 === e.jquery && void 0 === e[0]) || (e = e[0]) : (e = q.findOne(e));
                    var n = '[data-bs-toggle="collapse"][data-bs-parent="' + e + '"]';
                    return (
                        q.find(n, e).forEach(function (e) {
                            var n = c(e);
                            t._addAriaAndCollapsedClass(n, [e]);
                        }),
                        e
                    );
                }),
                (r._addAriaAndCollapsedClass = function (t, e) {
                    if (t && e.length) {
                        var n = t.classList.contains("show");
                        e.forEach(function (t) {
                            n ? t.classList.remove("collapsed") : t.classList.add("collapsed"), t.setAttribute("aria-expanded", n);
                        });
                    }
                }),
                (o.collapseInterface = function (t, e) {
                    var i = T(t, "bs.collapse"),
                        r = n({}, tt, Y.getDataAttributes(t), "object" == typeof e && e ? e : {});
                    if ((!i && r.toggle && "string" == typeof e && /show|hide/.test(e) && (r.toggle = !1), i || (i = new o(t, r)), "string" == typeof e)) {
                        if (void 0 === i[e]) throw new TypeError('No method named "' + e + '"');
                        i[e]();
                    }
                }),
                (o.jQueryInterface = function (t) {
                    return this.each(function () {
                        o.collapseInterface(this, t);
                    });
                }),
                e(o, null, [
                    {
                        key: "Default",
                        get: function () {
                            return tt;
                        },
                    },
                    {
                        key: "DATA_KEY",
                        get: function () {
                            return "bs.collapse";
                        },
                    },
                ]),
                o
            );
        })(R);
    H.on(document, "click.bs.collapse.data-api", '[data-bs-toggle="collapse"]', function (t) {
        "A" === t.target.tagName && t.preventDefault();
        var e = Y.getDataAttributes(this),
            n = l(this);
        q.find(n).forEach(function (t) {
            var n,
                i = T(t, "bs.collapse");
            i ? (null === i._parent && "string" == typeof e.parent && ((i._config.parent = e.parent), (i._parent = i._getParent())), (n = "toggle")) : (n = e), nt.collapseInterface(t, n);
        });
    }),
        b(function () {
            var t = _();
            if (t) {
                var e = t.fn[J];
                (t.fn[J] = nt.jQueryInterface),
                    (t.fn[J].Constructor = nt),
                    (t.fn[J].noConflict = function () {
                        return (t.fn[J] = e), nt.jQueryInterface;
                    });
            }
        });
    var it = "top",
        ot = "bottom",
        rt = "right",
        st = "left",
        at = [it, ot, rt, st],
        lt = at.reduce(function (t, e) {
            return t.concat([e + "-start", e + "-end"]);
        }, []),
        ct = [].concat(at, ["auto"]).reduce(function (t, e) {
            return t.concat([e, e + "-start", e + "-end"]);
        }, []),
        ut = ["beforeRead", "read", "afterRead", "beforeMain", "main", "afterMain", "beforeWrite", "write", "afterWrite"];
    function ft(t) {
        return t ? (t.nodeName || "").toLowerCase() : null;
    }
    function dt(t) {
        if ("[object Window]" !== t.toString()) {
            var e = t.ownerDocument;
            return (e && e.defaultView) || window;
        }
        return t;
    }
    function ht(t) {
        return t instanceof dt(t).Element || t instanceof Element;
    }
    function pt(t) {
        return t instanceof dt(t).HTMLElement || t instanceof HTMLElement;
    }
    var gt = {
        name: "applyStyles",
        enabled: !0,
        phase: "write",
        fn: function (t) {
            var e = t.state;
            Object.keys(e.elements).forEach(function (t) {
                var n = e.styles[t] || {},
                    i = e.attributes[t] || {},
                    o = e.elements[t];
                pt(o) &&
                    ft(o) &&
                    (Object.assign(o.style, n),
                    Object.keys(i).forEach(function (t) {
                        var e = i[t];
                        !1 === e ? o.removeAttribute(t) : o.setAttribute(t, !0 === e ? "" : e);
                    }));
            });
        },
        effect: function (t) {
            var e = t.state,
                n = { popper: { position: e.options.strategy, left: "0", top: "0", margin: "0" }, arrow: { position: "absolute" }, reference: {} };
            return (
                Object.assign(e.elements.popper.style, n.popper),
                e.elements.arrow && Object.assign(e.elements.arrow.style, n.arrow),
                function () {
                    Object.keys(e.elements).forEach(function (t) {
                        var i = e.elements[t],
                            o = e.attributes[t] || {},
                            r = Object.keys(e.styles.hasOwnProperty(t) ? e.styles[t] : n[t]).reduce(function (t, e) {
                                return (t[e] = ""), t;
                            }, {});
                        pt(i) &&
                            ft(i) &&
                            (Object.assign(i.style, r),
                            Object.keys(o).forEach(function (t) {
                                i.removeAttribute(t);
                            }));
                    });
                }
            );
        },
        requires: ["computeStyles"],
    };
    function mt(t) {
        return t.split("-")[0];
    }
    function vt(t) {
        return { x: t.offsetLeft, y: t.offsetTop, width: t.offsetWidth, height: t.offsetHeight };
    }
    function _t(t, e) {
        var n,
            i = e.getRootNode && e.getRootNode();
        if (t.contains(e)) return !0;
        if (i && ((n = i) instanceof dt(n).ShadowRoot || n instanceof ShadowRoot)) {
            var o = e;
            do {
                if (o && t.isSameNode(o)) return !0;
                o = o.parentNode || o.host;
            } while (o);
        }
        return !1;
    }
    function bt(t) {
        return dt(t).getComputedStyle(t);
    }
    function yt(t) {
        return ["table", "td", "th"].indexOf(ft(t)) >= 0;
    }
    function wt(t) {
        return ((ht(t) ? t.ownerDocument : t.document) || window.document).documentElement;
    }
    function Et(t) {
        return "html" === ft(t) ? t : t.assignedSlot || t.parentNode || t.host || wt(t);
    }
    function Tt(t) {
        if (!pt(t) || "fixed" === bt(t).position) return null;
        var e = t.offsetParent;
        if (e) {
            var n = wt(e);
            if ("body" === ft(e) && "static" === bt(e).position && "static" !== bt(n).position) return n;
        }
        return e;
    }
    function kt(t) {
        for (var e = dt(t), n = Tt(t); n && yt(n) && "static" === bt(n).position; ) n = Tt(n);
        return n && "body" === ft(n) && "static" === bt(n).position
            ? e
            : n ||
                  (function (t) {
                      for (var e = Et(t); pt(e) && ["html", "body"].indexOf(ft(e)) < 0; ) {
                          var n = bt(e);
                          if ("none" !== n.transform || "none" !== n.perspective || (n.willChange && "auto" !== n.willChange)) return e;
                          e = e.parentNode;
                      }
                      return null;
                  })(t) ||
                  e;
    }
    function Ot(t) {
        return ["top", "bottom"].indexOf(t) >= 0 ? "x" : "y";
    }
    function Lt(t, e, n) {
        return Math.max(t, Math.min(e, n));
    }
    function At(t) {
        return Object.assign(Object.assign({}, { top: 0, right: 0, bottom: 0, left: 0 }), t);
    }
    function Ct(t, e) {
        return e.reduce(function (e, n) {
            return (e[n] = t), e;
        }, {});
    }
    var Dt = {
            name: "arrow",
            enabled: !0,
            phase: "main",
            fn: function (t) {
                var e,
                    n = t.state,
                    i = t.name,
                    o = n.elements.arrow,
                    r = n.modifiersData.popperOffsets,
                    s = mt(n.placement),
                    a = Ot(s),
                    l = [st, rt].indexOf(s) >= 0 ? "height" : "width";
                if (o && r) {
                    var c = n.modifiersData[i + "#persistent"].padding,
                        u = vt(o),
                        f = "y" === a ? it : st,
                        d = "y" === a ? ot : rt,
                        h = n.rects.reference[l] + n.rects.reference[a] - r[a] - n.rects.popper[l],
                        p = r[a] - n.rects.reference[a],
                        g = kt(o),
                        m = g ? ("y" === a ? g.clientHeight || 0 : g.clientWidth || 0) : 0,
                        v = h / 2 - p / 2,
                        _ = c[f],
                        b = m - u[l] - c[d],
                        y = m / 2 - u[l] / 2 + v,
                        w = Lt(_, y, b),
                        E = a;
                    n.modifiersData[i] = (((e = {})[E] = w), (e.centerOffset = w - y), e);
                }
            },
            effect: function (t) {
                var e = t.state,
                    n = t.options,
                    i = t.name,
                    o = n.element,
                    r = void 0 === o ? "[data-popper-arrow]" : o,
                    s = n.padding,
                    a = void 0 === s ? 0 : s;
                null != r &&
                    ("string" != typeof r || (r = e.elements.popper.querySelector(r))) &&
                    _t(e.elements.popper, r) &&
                    ((e.elements.arrow = r), (e.modifiersData[i + "#persistent"] = { padding: At("number" != typeof a ? a : Ct(a, at)) }));
            },
            requires: ["popperOffsets"],
            requiresIfExists: ["preventOverflow"],
        },
        xt = { top: "auto", right: "auto", bottom: "auto", left: "auto" };
    function St(t) {
        var e,
            n = t.popper,
            i = t.popperRect,
            o = t.placement,
            r = t.offsets,
            s = t.position,
            a = t.gpuAcceleration,
            l = t.adaptive,
            c = (function (t) {
                var e = t.x,
                    n = t.y,
                    i = window.devicePixelRatio || 1;
                return { x: Math.round(e * i) / i || 0, y: Math.round(n * i) / i || 0 };
            })(r),
            u = c.x,
            f = c.y,
            d = r.hasOwnProperty("x"),
            h = r.hasOwnProperty("y"),
            p = st,
            g = it,
            m = window;
        if (l) {
            var v = kt(n);
            v === dt(n) && (v = wt(n)), o === it && ((g = ot), (f -= v.clientHeight - i.height), (f *= a ? 1 : -1)), o === st && ((p = rt), (u -= v.clientWidth - i.width), (u *= a ? 1 : -1));
        }
        var _,
            b = Object.assign({ position: s }, l && xt);
        return a
            ? Object.assign(
                  Object.assign({}, b),
                  {},
                  (((_ = {})[g] = h ? "0" : ""), (_[p] = d ? "0" : ""), (_.transform = (m.devicePixelRatio || 1) < 2 ? "translate(" + u + "px, " + f + "px)" : "translate3d(" + u + "px, " + f + "px, 0)"), _)
              )
            : Object.assign(Object.assign({}, b), {}, (((e = {})[g] = h ? f + "px" : ""), (e[p] = d ? u + "px" : ""), (e.transform = ""), e));
    }
    var jt = {
            name: "computeStyles",
            enabled: !0,
            phase: "beforeWrite",
            fn: function (t) {
                var e = t.state,
                    n = t.options,
                    i = n.gpuAcceleration,
                    o = void 0 === i || i,
                    r = n.adaptive,
                    s = void 0 === r || r,
                    a = { placement: mt(e.placement), popper: e.elements.popper, popperRect: e.rects.popper, gpuAcceleration: o };
                null != e.modifiersData.popperOffsets &&
                    (e.styles.popper = Object.assign(Object.assign({}, e.styles.popper), St(Object.assign(Object.assign({}, a), {}, { offsets: e.modifiersData.popperOffsets, position: e.options.strategy, adaptive: s })))),
                    null != e.modifiersData.arrow && (e.styles.arrow = Object.assign(Object.assign({}, e.styles.arrow), St(Object.assign(Object.assign({}, a), {}, { offsets: e.modifiersData.arrow, position: "absolute", adaptive: !1 })))),
                    (e.attributes.popper = Object.assign(Object.assign({}, e.attributes.popper), {}, { "data-popper-placement": e.placement }));
            },
            data: {},
        },
        Nt = { passive: !0 };
    var It = {
            name: "eventListeners",
            enabled: !0,
            phase: "write",
            fn: function () {},
            effect: function (t) {
                var e = t.state,
                    n = t.instance,
                    i = t.options,
                    o = i.scroll,
                    r = void 0 === o || o,
                    s = i.resize,
                    a = void 0 === s || s,
                    l = dt(e.elements.popper),
                    c = [].concat(e.scrollParents.reference, e.scrollParents.popper);
                return (
                    r &&
                        c.forEach(function (t) {
                            t.addEventListener("scroll", n.update, Nt);
                        }),
                    a && l.addEventListener("resize", n.update, Nt),
                    function () {
                        r &&
                            c.forEach(function (t) {
                                t.removeEventListener("scroll", n.update, Nt);
                            }),
                            a && l.removeEventListener("resize", n.update, Nt);
                    }
                );
            },
            data: {},
        },
        Pt = { left: "right", right: "left", bottom: "top", top: "bottom" };
    function Mt(t) {
        return t.replace(/left|right|bottom|top/g, function (t) {
            return Pt[t];
        });
    }
    var Bt = { start: "end", end: "start" };
    function Ht(t) {
        return t.replace(/start|end/g, function (t) {
            return Bt[t];
        });
    }
    function Rt(t) {
        var e = t.getBoundingClientRect();
        return { width: e.width, height: e.height, top: e.top, right: e.right, bottom: e.bottom, left: e.left, x: e.left, y: e.top };
    }
    function Wt(t) {
        var e = dt(t);
        return { scrollLeft: e.pageXOffset, scrollTop: e.pageYOffset };
    }
    function Kt(t) {
        return Rt(wt(t)).left + Wt(t).scrollLeft;
    }
    function Qt(t) {
        var e = bt(t),
            n = e.overflow,
            i = e.overflowX,
            o = e.overflowY;
        return /auto|scroll|overlay|hidden/.test(n + o + i);
    }
    function Ut(t, e) {
        void 0 === e && (e = []);
        var n = (function t(e) {
                return ["html", "body", "#document"].indexOf(ft(e)) >= 0 ? e.ownerDocument.body : pt(e) && Qt(e) ? e : t(Et(e));
            })(t),
            i = "body" === ft(n),
            o = dt(n),
            r = i ? [o].concat(o.visualViewport || [], Qt(n) ? n : []) : n,
            s = e.concat(r);
        return i ? s : s.concat(Ut(Et(r)));
    }
    function Ft(t) {
        return Object.assign(Object.assign({}, t), {}, { left: t.x, top: t.y, right: t.x + t.width, bottom: t.y + t.height });
    }
    function Yt(t, e) {
        return "viewport" === e
            ? Ft(
                  (function (t) {
                      var e = dt(t),
                          n = wt(t),
                          i = e.visualViewport,
                          o = n.clientWidth,
                          r = n.clientHeight,
                          s = 0,
                          a = 0;
                      return i && ((o = i.width), (r = i.height), /^((?!chrome|android).)*safari/i.test(navigator.userAgent) || ((s = i.offsetLeft), (a = i.offsetTop))), { width: o, height: r, x: s + Kt(t), y: a };
                  })(t)
              )
            : pt(e)
            ? (function (t) {
                  var e = Rt(t);
                  return (
                      (e.top = e.top + t.clientTop),
                      (e.left = e.left + t.clientLeft),
                      (e.bottom = e.top + t.clientHeight),
                      (e.right = e.left + t.clientWidth),
                      (e.width = t.clientWidth),
                      (e.height = t.clientHeight),
                      (e.x = e.left),
                      (e.y = e.top),
                      e
                  );
              })(e)
            : Ft(
                  (function (t) {
                      var e = wt(t),
                          n = Wt(t),
                          i = t.ownerDocument.body,
                          o = Math.max(e.scrollWidth, e.clientWidth, i ? i.scrollWidth : 0, i ? i.clientWidth : 0),
                          r = Math.max(e.scrollHeight, e.clientHeight, i ? i.scrollHeight : 0, i ? i.clientHeight : 0),
                          s = -n.scrollLeft + Kt(t),
                          a = -n.scrollTop;
                      return "rtl" === bt(i || e).direction && (s += Math.max(e.clientWidth, i ? i.clientWidth : 0) - o), { width: o, height: r, x: s, y: a };
                  })(wt(t))
              );
    }
    function qt(t, e, n) {
        var i =
                "clippingParents" === e
                    ? (function (t) {
                          var e = Ut(Et(t)),
                              n = ["absolute", "fixed"].indexOf(bt(t).position) >= 0 && pt(t) ? kt(t) : t;
                          return ht(n)
                              ? e.filter(function (t) {
                                    return ht(t) && _t(t, n) && "body" !== ft(t);
                                })
                              : [];
                      })(t)
                    : [].concat(e),
            o = [].concat(i, [n]),
            r = o[0],
            s = o.reduce(function (e, n) {
                var i = Yt(t, n);
                return (e.top = Math.max(i.top, e.top)), (e.right = Math.min(i.right, e.right)), (e.bottom = Math.min(i.bottom, e.bottom)), (e.left = Math.max(i.left, e.left)), e;
            }, Yt(t, r));
        return (s.width = s.right - s.left), (s.height = s.bottom - s.top), (s.x = s.left), (s.y = s.top), s;
    }
    function zt(t) {
        return t.split("-")[1];
    }
    function Vt(t) {
        var e,
            n = t.reference,
            i = t.element,
            o = t.placement,
            r = o ? mt(o) : null,
            s = o ? zt(o) : null,
            a = n.x + n.width / 2 - i.width / 2,
            l = n.y + n.height / 2 - i.height / 2;
        switch (r) {
            case it:
                e = { x: a, y: n.y - i.height };
                break;
            case ot:
                e = { x: a, y: n.y + n.height };
                break;
            case rt:
                e = { x: n.x + n.width, y: l };
                break;
            case st:
                e = { x: n.x - i.width, y: l };
                break;
            default:
                e = { x: n.x, y: n.y };
        }
        var c = r ? Ot(r) : null;
        if (null != c) {
            var u = "y" === c ? "height" : "width";
            switch (s) {
                case "start":
                    e[c] = Math.floor(e[c]) - Math.floor(n[u] / 2 - i[u] / 2);
                    break;
                case "end":
                    e[c] = Math.floor(e[c]) + Math.ceil(n[u] / 2 - i[u] / 2);
            }
        }
        return e;
    }
    function Xt(t, e) {
        void 0 === e && (e = {});
        var n = e,
            i = n.placement,
            o = void 0 === i ? t.placement : i,
            r = n.boundary,
            s = void 0 === r ? "clippingParents" : r,
            a = n.rootBoundary,
            l = void 0 === a ? "viewport" : a,
            c = n.elementContext,
            u = void 0 === c ? "popper" : c,
            f = n.altBoundary,
            d = void 0 !== f && f,
            h = n.padding,
            p = void 0 === h ? 0 : h,
            g = At("number" != typeof p ? p : Ct(p, at)),
            m = "popper" === u ? "reference" : "popper",
            v = t.elements.reference,
            _ = t.rects.popper,
            b = t.elements[d ? m : u],
            y = qt(ht(b) ? b : b.contextElement || wt(t.elements.popper), s, l),
            w = Rt(v),
            E = Vt({ reference: w, element: _, strategy: "absolute", placement: o }),
            T = Ft(Object.assign(Object.assign({}, _), E)),
            k = "popper" === u ? T : w,
            O = { top: y.top - k.top + g.top, bottom: k.bottom - y.bottom + g.bottom, left: y.left - k.left + g.left, right: k.right - y.right + g.right },
            L = t.modifiersData.offset;
        if ("popper" === u && L) {
            var A = L[o];
            Object.keys(O).forEach(function (t) {
                var e = [rt, ot].indexOf(t) >= 0 ? 1 : -1,
                    n = [it, ot].indexOf(t) >= 0 ? "y" : "x";
                O[t] += A[n] * e;
            });
        }
        return O;
    }
    function $t(t, e) {
        void 0 === e && (e = {});
        var n = e,
            i = n.placement,
            o = n.boundary,
            r = n.rootBoundary,
            s = n.padding,
            a = n.flipVariations,
            l = n.allowedAutoPlacements,
            c = void 0 === l ? ct : l,
            u = zt(i),
            f = u
                ? a
                    ? lt
                    : lt.filter(function (t) {
                          return zt(t) === u;
                      })
                : at,
            d = f.filter(function (t) {
                return c.indexOf(t) >= 0;
            });
        0 === d.length && (d = f);
        var h = d.reduce(function (e, n) {
            return (e[n] = Xt(t, { placement: n, boundary: o, rootBoundary: r, padding: s })[mt(n)]), e;
        }, {});
        return Object.keys(h).sort(function (t, e) {
            return h[t] - h[e];
        });
    }
    var Gt = {
        name: "flip",
        enabled: !0,
        phase: "main",
        fn: function (t) {
            var e = t.state,
                n = t.options,
                i = t.name;
            if (!e.modifiersData[i]._skip) {
                for (
                    var o = n.mainAxis,
                        r = void 0 === o || o,
                        s = n.altAxis,
                        a = void 0 === s || s,
                        l = n.fallbackPlacements,
                        c = n.padding,
                        u = n.boundary,
                        f = n.rootBoundary,
                        d = n.altBoundary,
                        h = n.flipVariations,
                        p = void 0 === h || h,
                        g = n.allowedAutoPlacements,
                        m = e.options.placement,
                        v = mt(m),
                        _ =
                            l ||
                            (v === m || !p
                                ? [Mt(m)]
                                : (function (t) {
                                      if ("auto" === mt(t)) return [];
                                      var e = Mt(t);
                                      return [Ht(t), e, Ht(e)];
                                  })(m)),
                        b = [m].concat(_).reduce(function (t, n) {
                            return t.concat("auto" === mt(n) ? $t(e, { placement: n, boundary: u, rootBoundary: f, padding: c, flipVariations: p, allowedAutoPlacements: g }) : n);
                        }, []),
                        y = e.rects.reference,
                        w = e.rects.popper,
                        E = new Map(),
                        T = !0,
                        k = b[0],
                        O = 0;
                    O < b.length;
                    O++
                ) {
                    var L = b[O],
                        A = mt(L),
                        C = "start" === zt(L),
                        D = [it, ot].indexOf(A) >= 0,
                        x = D ? "width" : "height",
                        S = Xt(e, { placement: L, boundary: u, rootBoundary: f, altBoundary: d, padding: c }),
                        j = D ? (C ? rt : st) : C ? ot : it;
                    y[x] > w[x] && (j = Mt(j));
                    var N = Mt(j),
                        I = [];
                    if (
                        (r && I.push(S[A] <= 0),
                        a && I.push(S[j] <= 0, S[N] <= 0),
                        I.every(function (t) {
                            return t;
                        }))
                    ) {
                        (k = L), (T = !1);
                        break;
                    }
                    E.set(L, I);
                }
                if (T)
                    for (
                        var P = function (t) {
                                var e = b.find(function (e) {
                                    var n = E.get(e);
                                    if (n)
                                        return n.slice(0, t).every(function (t) {
                                            return t;
                                        });
                                });
                                if (e) return (k = e), "break";
                            },
                            M = p ? 3 : 1;
                        M > 0;
                        M--
                    ) {
                        if ("break" === P(M)) break;
                    }
                e.placement !== k && ((e.modifiersData[i]._skip = !0), (e.placement = k), (e.reset = !0));
            }
        },
        requiresIfExists: ["offset"],
        data: { _skip: !1 },
    };
    function Zt(t, e, n) {
        return void 0 === n && (n = { x: 0, y: 0 }), { top: t.top - e.height - n.y, right: t.right - e.width + n.x, bottom: t.bottom - e.height + n.y, left: t.left - e.width - n.x };
    }
    function Jt(t) {
        return [it, rt, ot, st].some(function (e) {
            return t[e] >= 0;
        });
    }
    var te = {
        name: "hide",
        enabled: !0,
        phase: "main",
        requiresIfExists: ["preventOverflow"],
        fn: function (t) {
            var e = t.state,
                n = t.name,
                i = e.rects.reference,
                o = e.rects.popper,
                r = e.modifiersData.preventOverflow,
                s = Xt(e, { elementContext: "reference" }),
                a = Xt(e, { altBoundary: !0 }),
                l = Zt(s, i),
                c = Zt(a, o, r),
                u = Jt(l),
                f = Jt(c);
            (e.modifiersData[n] = { referenceClippingOffsets: l, popperEscapeOffsets: c, isReferenceHidden: u, hasPopperEscaped: f }),
                (e.attributes.popper = Object.assign(Object.assign({}, e.attributes.popper), {}, { "data-popper-reference-hidden": u, "data-popper-escaped": f }));
        },
    };
    var ee = {
        name: "offset",
        enabled: !0,
        phase: "main",
        requires: ["popperOffsets"],
        fn: function (t) {
            var e = t.state,
                n = t.options,
                i = t.name,
                o = n.offset,
                r = void 0 === o ? [0, 0] : o,
                s = ct.reduce(function (t, n) {
                    return (
                        (t[n] = (function (t, e, n) {
                            var i = mt(t),
                                o = [st, it].indexOf(i) >= 0 ? -1 : 1,
                                r = "function" == typeof n ? n(Object.assign(Object.assign({}, e), {}, { placement: t })) : n,
                                s = r[0],
                                a = r[1];
                            return (s = s || 0), (a = (a || 0) * o), [st, rt].indexOf(i) >= 0 ? { x: a, y: s } : { x: s, y: a };
                        })(n, e.rects, r)),
                        t
                    );
                }, {}),
                a = s[e.placement],
                l = a.x,
                c = a.y;
            null != e.modifiersData.popperOffsets && ((e.modifiersData.popperOffsets.x += l), (e.modifiersData.popperOffsets.y += c)), (e.modifiersData[i] = s);
        },
    };
    var ne = {
        name: "popperOffsets",
        enabled: !0,
        phase: "read",
        fn: function (t) {
            var e = t.state,
                n = t.name;
            e.modifiersData[n] = Vt({ reference: e.rects.reference, element: e.rects.popper, strategy: "absolute", placement: e.placement });
        },
        data: {},
    };
    var ie = {
        name: "preventOverflow",
        enabled: !0,
        phase: "main",
        fn: function (t) {
            var e = t.state,
                n = t.options,
                i = t.name,
                o = n.mainAxis,
                r = void 0 === o || o,
                s = n.altAxis,
                a = void 0 !== s && s,
                l = n.boundary,
                c = n.rootBoundary,
                u = n.altBoundary,
                f = n.padding,
                d = n.tether,
                h = void 0 === d || d,
                p = n.tetherOffset,
                g = void 0 === p ? 0 : p,
                m = Xt(e, { boundary: l, rootBoundary: c, padding: f, altBoundary: u }),
                v = mt(e.placement),
                _ = zt(e.placement),
                b = !_,
                y = Ot(v),
                w = "x" === y ? "y" : "x",
                E = e.modifiersData.popperOffsets,
                T = e.rects.reference,
                k = e.rects.popper,
                O = "function" == typeof g ? g(Object.assign(Object.assign({}, e.rects), {}, { placement: e.placement })) : g,
                L = { x: 0, y: 0 };
            if (E) {
                if (r) {
                    var A = "y" === y ? it : st,
                        C = "y" === y ? ot : rt,
                        D = "y" === y ? "height" : "width",
                        x = E[y],
                        S = E[y] + m[A],
                        j = E[y] - m[C],
                        N = h ? -k[D] / 2 : 0,
                        I = "start" === _ ? T[D] : k[D],
                        P = "start" === _ ? -k[D] : -T[D],
                        M = e.elements.arrow,
                        B = h && M ? vt(M) : { width: 0, height: 0 },
                        H = e.modifiersData["arrow#persistent"] ? e.modifiersData["arrow#persistent"].padding : { top: 0, right: 0, bottom: 0, left: 0 },
                        R = H[A],
                        W = H[C],
                        K = Lt(0, T[D], B[D]),
                        Q = b ? T[D] / 2 - N - K - R - O : I - K - R - O,
                        U = b ? -T[D] / 2 + N + K + W + O : P + K + W + O,
                        F = e.elements.arrow && kt(e.elements.arrow),
                        Y = F ? ("y" === y ? F.clientTop || 0 : F.clientLeft || 0) : 0,
                        q = e.modifiersData.offset ? e.modifiersData.offset[e.placement][y] : 0,
                        z = E[y] + Q - q - Y,
                        V = E[y] + U - q,
                        X = Lt(h ? Math.min(S, z) : S, x, h ? Math.max(j, V) : j);
                    (E[y] = X), (L[y] = X - x);
                }
                if (a) {
                    var $ = "x" === y ? it : st,
                        G = "x" === y ? ot : rt,
                        Z = E[w],
                        J = Lt(Z + m[$], Z, Z - m[G]);
                    (E[w] = J), (L[w] = J - Z);
                }
                e.modifiersData[i] = L;
            }
        },
        requiresIfExists: ["offset"],
    };
    function oe(t, e, n) {
        void 0 === n && (n = !1);
        var i,
            o,
            r = wt(e),
            s = Rt(t),
            a = pt(e),
            l = { scrollLeft: 0, scrollTop: 0 },
            c = { x: 0, y: 0 };
        return (
            (a || (!a && !n)) &&
                (("body" !== ft(e) || Qt(r)) && (l = (i = e) !== dt(i) && pt(i) ? { scrollLeft: (o = i).scrollLeft, scrollTop: o.scrollTop } : Wt(i)), pt(e) ? (((c = Rt(e)).x += e.clientLeft), (c.y += e.clientTop)) : r && (c.x = Kt(r))),
            { x: s.left + l.scrollLeft - c.x, y: s.top + l.scrollTop - c.y, width: s.width, height: s.height }
        );
    }
    function re(t) {
        var e = new Map(),
            n = new Set(),
            i = [];
        return (
            t.forEach(function (t) {
                e.set(t.name, t);
            }),
            t.forEach(function (t) {
                n.has(t.name) ||
                    (function t(o) {
                        n.add(o.name),
                            [].concat(o.requires || [], o.requiresIfExists || []).forEach(function (i) {
                                if (!n.has(i)) {
                                    var o = e.get(i);
                                    o && t(o);
                                }
                            }),
                            i.push(o);
                    })(t);
            }),
            i
        );
    }
    var se = { placement: "bottom", modifiers: [], strategy: "absolute" };
    function ae() {
        for (var t = arguments.length, e = new Array(t), n = 0; n < t; n++) e[n] = arguments[n];
        return !e.some(function (t) {
            return !(t && "function" == typeof t.getBoundingClientRect);
        });
    }
    function le(t) {
        void 0 === t && (t = {});
        var e = t,
            n = e.defaultModifiers,
            i = void 0 === n ? [] : n,
            o = e.defaultOptions,
            r = void 0 === o ? se : o;
        return function (t, e, n) {
            void 0 === n && (n = r);
            var o,
                s,
                a = { placement: "bottom", orderedModifiers: [], options: Object.assign(Object.assign({}, se), r), modifiersData: {}, elements: { reference: t, popper: e }, attributes: {}, styles: {} },
                l = [],
                c = !1,
                u = {
                    state: a,
                    setOptions: function (n) {
                        f(), (a.options = Object.assign(Object.assign(Object.assign({}, r), a.options), n)), (a.scrollParents = { reference: ht(t) ? Ut(t) : t.contextElement ? Ut(t.contextElement) : [], popper: Ut(e) });
                        var o,
                            s,
                            c = (function (t) {
                                var e = re(t);
                                return ut.reduce(function (t, n) {
                                    return t.concat(
                                        e.filter(function (t) {
                                            return t.phase === n;
                                        })
                                    );
                                }, []);
                            })(
                                ((o = [].concat(i, a.options.modifiers)),
                                (s = o.reduce(function (t, e) {
                                    var n = t[e.name];
                                    return (
                                        (t[e.name] = n
                                            ? Object.assign(Object.assign(Object.assign({}, n), e), {}, { options: Object.assign(Object.assign({}, n.options), e.options), data: Object.assign(Object.assign({}, n.data), e.data) })
                                            : e),
                                        t
                                    );
                                }, {})),
                                Object.keys(s).map(function (t) {
                                    return s[t];
                                }))
                            );
                        return (
                            (a.orderedModifiers = c.filter(function (t) {
                                return t.enabled;
                            })),
                            a.orderedModifiers.forEach(function (t) {
                                var e = t.name,
                                    n = t.options,
                                    i = void 0 === n ? {} : n,
                                    o = t.effect;
                                if ("function" == typeof o) {
                                    var r = o({ state: a, name: e, instance: u, options: i }),
                                        s = function () {};
                                    l.push(r || s);
                                }
                            }),
                            u.update()
                        );
                    },
                    forceUpdate: function () {
                        if (!c) {
                            var t = a.elements,
                                e = t.reference,
                                n = t.popper;
                            if (ae(e, n)) {
                                (a.rects = { reference: oe(e, kt(n), "fixed" === a.options.strategy), popper: vt(n) }),
                                    (a.reset = !1),
                                    (a.placement = a.options.placement),
                                    a.orderedModifiers.forEach(function (t) {
                                        return (a.modifiersData[t.name] = Object.assign({}, t.data));
                                    });
                                for (var i = 0; i < a.orderedModifiers.length; i++)
                                    if (!0 !== a.reset) {
                                        var o = a.orderedModifiers[i],
                                            r = o.fn,
                                            s = o.options,
                                            l = void 0 === s ? {} : s,
                                            f = o.name;
                                        "function" == typeof r && (a = r({ state: a, options: l, name: f, instance: u }) || a);
                                    } else (a.reset = !1), (i = -1);
                            }
                        }
                    },
                    update:
                        ((o = function () {
                            return new Promise(function (t) {
                                u.forceUpdate(), t(a);
                            });
                        }),
                        function () {
                            return (
                                s ||
                                    (s = new Promise(function (t) {
                                        Promise.resolve().then(function () {
                                            (s = void 0), t(o());
                                        });
                                    })),
                                s
                            );
                        }),
                    destroy: function () {
                        f(), (c = !0);
                    },
                };
            if (!ae(t, e)) return u;
            function f() {
                l.forEach(function (t) {
                    return t();
                }),
                    (l = []);
            }
            return (
                u.setOptions(n).then(function (t) {
                    !c && n.onFirstUpdate && n.onFirstUpdate(t);
                }),
                u
            );
        };
    }
    var ce = le(),
        ue = le({ defaultModifiers: [It, ne, jt, gt] }),
        fe = le({ defaultModifiers: [It, ne, jt, gt, ee, Gt, ie, Dt, te] }),
        de = Object.freeze({
            __proto__: null,
            popperGenerator: le,
            detectOverflow: Xt,
            createPopperBase: ce,
            createPopper: fe,
            createPopperLite: ue,
            top: it,
            bottom: ot,
            right: rt,
            left: st,
            auto: "auto",
            basePlacements: at,
            start: "start",
            end: "end",
            clippingParents: "clippingParents",
            viewport: "viewport",
            popper: "popper",
            reference: "reference",
            variationPlacements: lt,
            placements: ct,
            beforeRead: "beforeRead",
            read: "read",
            afterRead: "afterRead",
            beforeMain: "beforeMain",
            main: "main",
            afterMain: "afterMain",
            beforeWrite: "beforeWrite",
            write: "write",
            afterWrite: "afterWrite",
            modifierPhases: ut,
            applyStyles: gt,
            arrow: Dt,
            computeStyles: jt,
            eventListeners: It,
            flip: Gt,
            hide: te,
            offset: ee,
            popperOffsets: ne,
            preventOverflow: ie,
        }),
        he = "dropdown",
        pe = new RegExp("ArrowUp|ArrowDown|Escape"),
        ge = y ? "top-end" : "top-start",
        me = y ? "top-start" : "top-end",
        ve = y ? "bottom-end" : "bottom-start",
        _e = y ? "bottom-start" : "bottom-end",
        be = y ? "left-start" : "right-start",
        ye = y ? "right-start" : "left-start",
        we = { offset: 0, flip: !0, boundary: "clippingParents", reference: "toggle", display: "dynamic", popperConfig: null },
        Ee = { offset: "(number|string|function)", flip: "boolean", boundary: "(string|element)", reference: "(string|element)", display: "string", popperConfig: "(null|object)" },
        Te = (function (t) {
            function o(e, n) {
                var i;
                return ((i = t.call(this, e) || this)._popper = null), (i._config = i._getConfig(n)), (i._menu = i._getMenuElement()), (i._inNavbar = i._detectNavbar()), i._addEventListeners(), i;
            }
            i(o, t);
            var r = o.prototype;
            return (
                (r.toggle = function () {
                    if (!this._element.disabled && !this._element.classList.contains("disabled")) {
                        var t = this._element.classList.contains("show");
                        o.clearMenus(), t || this.show();
                    }
                }),
                (r.show = function () {
                    if (!(this._element.disabled || this._element.classList.contains("disabled") || this._menu.classList.contains("show"))) {
                        var t = o.getParentFromElement(this._element),
                            e = { relatedTarget: this._element };
                        if (!H.trigger(this._element, "show.bs.dropdown", e).defaultPrevented) {
                            if (!this._inNavbar) {
                                if (void 0 === de) throw new TypeError("Bootstrap's dropdowns require Popper (https://popper.js.org)");
                                var n = this._element;
                                "parent" === this._config.reference ? (n = t) : d(this._config.reference) && ((n = this._config.reference), void 0 !== this._config.reference.jquery && (n = this._config.reference[0])),
                                    (this._popper = fe(n, this._menu, this._getPopperConfig()));
                            }
                            var i;
                            if ("ontouchstart" in document.documentElement && !t.closest(".navbar-nav"))
                                (i = []).concat.apply(i, document.body.children).forEach(function (t) {
                                    return H.on(t, "mouseover", null, function () {});
                                });
                            this._element.focus(), this._element.setAttribute("aria-expanded", !0), this._menu.classList.toggle("show"), this._element.classList.toggle("show"), H.trigger(t, "shown.bs.dropdown", e);
                        }
                    }
                }),
                (r.hide = function () {
                    if (!this._element.disabled && !this._element.classList.contains("disabled") && this._menu.classList.contains("show")) {
                        var t = o.getParentFromElement(this._element),
                            e = { relatedTarget: this._element };
                        H.trigger(t, "hide.bs.dropdown", e).defaultPrevented || (this._popper && this._popper.destroy(), this._menu.classList.toggle("show"), this._element.classList.toggle("show"), H.trigger(t, "hidden.bs.dropdown", e));
                    }
                }),
                (r.dispose = function () {
                    t.prototype.dispose.call(this), H.off(this._element, ".bs.dropdown"), (this._menu = null), this._popper && (this._popper.destroy(), (this._popper = null));
                }),
                (r.update = function () {
                    (this._inNavbar = this._detectNavbar()), this._popper && this._popper.update();
                }),
                (r._addEventListeners = function () {
                    var t = this;
                    H.on(this._element, "click.bs.dropdown", function (e) {
                        e.preventDefault(), e.stopPropagation(), t.toggle();
                    });
                }),
                (r._getConfig = function (t) {
                    return (t = n({}, this.constructor.Default, Y.getDataAttributes(this._element), t)), p(he, t, this.constructor.DefaultType), t;
                }),
                (r._getMenuElement = function () {
                    return q.next(this._element, ".dropdown-menu")[0];
                }),
                (r._getPlacement = function () {
                    var t = this._element.parentNode;
                    if (t.classList.contains("dropend")) return be;
                    if (t.classList.contains("dropstart")) return ye;
                    var e = "end" === getComputedStyle(this._menu).getPropertyValue("--bs-position").trim();
                    return t.classList.contains("dropup") ? (e ? me : ge) : e ? _e : ve;
                }),
                (r._detectNavbar = function () {
                    return null !== this._element.closest(".navbar");
                }),
                (r._getPopperConfig = function () {
                    var t = { placement: this._getPlacement(), modifiers: [{ name: "preventOverflow", options: { altBoundary: this._config.flip, rootBoundary: this._config.boundary } }] };
                    return "static" === this._config.display && (t.modifiers = [{ name: "applyStyles", enabled: !1 }]), n({}, t, this._config.popperConfig);
                }),
                (o.dropdownInterface = function (t, e) {
                    var n = T(t, "bs.dropdown");
                    if ((n || (n = new o(t, "object" == typeof e ? e : null)), "string" == typeof e)) {
                        if (void 0 === n[e]) throw new TypeError('No method named "' + e + '"');
                        n[e]();
                    }
                }),
                (o.jQueryInterface = function (t) {
                    return this.each(function () {
                        o.dropdownInterface(this, t);
                    });
                }),
                (o.clearMenus = function (t) {
                    if (!t || (2 !== t.button && ("keyup" !== t.type || "Tab" === t.key)))
                        for (var e = q.find('[data-bs-toggle="dropdown"]'), n = 0, i = e.length; n < i; n++) {
                            var r = o.getParentFromElement(e[n]),
                                s = T(e[n], "bs.dropdown"),
                                a = { relatedTarget: e[n] };
                            if ((t && "click" === t.type && (a.clickEvent = t), s)) {
                                var l = s._menu;
                                if (e[n].classList.contains("show"))
                                    if (!(t && (("click" === t.type && /input|textarea/i.test(t.target.tagName)) || ("keyup" === t.type && "Tab" === t.key)) && l.contains(t.target)))
                                        if (!H.trigger(r, "hide.bs.dropdown", a).defaultPrevented) {
                                            var c;
                                            if ("ontouchstart" in document.documentElement)
                                                (c = []).concat.apply(c, document.body.children).forEach(function (t) {
                                                    return H.off(t, "mouseover", null, function () {});
                                                });
                                            e[n].setAttribute("aria-expanded", "false"), s._popper && s._popper.destroy(), l.classList.remove("show"), e[n].classList.remove("show"), H.trigger(r, "hidden.bs.dropdown", a);
                                        }
                            }
                        }
                }),
                (o.getParentFromElement = function (t) {
                    return c(t) || t.parentNode;
                }),
                (o.dataApiKeydownHandler = function (t) {
                    if (
                        !(/input|textarea/i.test(t.target.tagName) ? "Space" === t.key || ("Escape" !== t.key && (("ArrowDown" !== t.key && "ArrowUp" !== t.key) || t.target.closest(".dropdown-menu"))) : !pe.test(t.key)) &&
                        (t.preventDefault(), t.stopPropagation(), !this.disabled && !this.classList.contains("disabled"))
                    ) {
                        var e = o.getParentFromElement(this),
                            n = this.classList.contains("show");
                        if ("Escape" === t.key) return (this.matches('[data-bs-toggle="dropdown"]') ? this : q.prev(this, '[data-bs-toggle="dropdown"]')[0]).focus(), void o.clearMenus();
                        if (n && "Space" !== t.key) {
                            var i = q.find(".dropdown-menu .dropdown-item:not(.disabled):not(:disabled)", e).filter(g);
                            if (i.length) {
                                var r = i.indexOf(t.target);
                                "ArrowUp" === t.key && r > 0 && r--, "ArrowDown" === t.key && r < i.length - 1 && r++, i[(r = -1 === r ? 0 : r)].focus();
                            }
                        } else o.clearMenus();
                    }
                }),
                e(o, null, [
                    {
                        key: "Default",
                        get: function () {
                            return we;
                        },
                    },
                    {
                        key: "DefaultType",
                        get: function () {
                            return Ee;
                        },
                    },
                    {
                        key: "DATA_KEY",
                        get: function () {
                            return "bs.dropdown";
                        },
                    },
                ]),
                o
            );
        })(R);
    H.on(document, "keydown.bs.dropdown.data-api", '[data-bs-toggle="dropdown"]', Te.dataApiKeydownHandler),
        H.on(document, "keydown.bs.dropdown.data-api", ".dropdown-menu", Te.dataApiKeydownHandler),
        H.on(document, "click.bs.dropdown.data-api", Te.clearMenus),
        H.on(document, "keyup.bs.dropdown.data-api", Te.clearMenus),
        H.on(document, "click.bs.dropdown.data-api", '[data-bs-toggle="dropdown"]', function (t) {
            t.preventDefault(), t.stopPropagation(), Te.dropdownInterface(this, "toggle");
        }),
        H.on(document, "click.bs.dropdown.data-api", ".dropdown form", function (t) {
            return t.stopPropagation();
        }),
        b(function () {
            var t = _();
            if (t) {
                var e = t.fn[he];
                (t.fn[he] = Te.jQueryInterface),
                    (t.fn[he].Constructor = Te),
                    (t.fn[he].noConflict = function () {
                        return (t.fn[he] = e), Te.jQueryInterface;
                    });
            }
        });
    var ke = { backdrop: !0, keyboard: !0, focus: !0 },
        Oe = { backdrop: "(boolean|string)", keyboard: "boolean", focus: "boolean" },
        Le = (function (t) {
            function o(e, n) {
                var i;
                return (
                    ((i = t.call(this, e) || this)._config = i._getConfig(n)),
                    (i._dialog = q.findOne(".modal-dialog", e)),
                    (i._backdrop = null),
                    (i._isShown = !1),
                    (i._isBodyOverflowing = !1),
                    (i._ignoreBackdropClick = !1),
                    (i._isTransitioning = !1),
                    (i._scrollbarWidth = 0),
                    i
                );
            }
            i(o, t);
            var r = o.prototype;
            return (
                (r.toggle = function (t) {
                    return this._isShown ? this.hide() : this.show(t);
                }),
                (r.show = function (t) {
                    var e = this;
                    if (!this._isShown && !this._isTransitioning) {
                        this._element.classList.contains("fade") && (this._isTransitioning = !0);
                        var n = H.trigger(this._element, "show.bs.modal", { relatedTarget: t });
                        this._isShown ||
                            n.defaultPrevented ||
                            ((this._isShown = !0),
                            this._checkScrollbar(),
                            this._setScrollbar(),
                            this._adjustDialog(),
                            this._setEscapeEvent(),
                            this._setResizeEvent(),
                            H.on(this._element, "click.dismiss.bs.modal", '[data-bs-dismiss="modal"]', function (t) {
                                return e.hide(t);
                            }),
                            H.on(this._dialog, "mousedown.dismiss.bs.modal", function () {
                                H.one(e._element, "mouseup.dismiss.bs.modal", function (t) {
                                    t.target === e._element && (e._ignoreBackdropClick = !0);
                                });
                            }),
                            this._showBackdrop(function () {
                                return e._showElement(t);
                            }));
                    }
                }),
                (r.hide = function (t) {
                    var e = this;
                    if ((t && t.preventDefault(), this._isShown && !this._isTransitioning) && !H.trigger(this._element, "hide.bs.modal").defaultPrevented) {
                        this._isShown = !1;
                        var n = this._element.classList.contains("fade");
                        if (
                            (n && (this._isTransitioning = !0),
                            this._setEscapeEvent(),
                            this._setResizeEvent(),
                            H.off(document, "focusin.bs.modal"),
                            this._element.classList.remove("show"),
                            H.off(this._element, "click.dismiss.bs.modal"),
                            H.off(this._dialog, "mousedown.dismiss.bs.modal"),
                            n)
                        ) {
                            var i = u(this._element);
                            H.one(this._element, "transitionend", function (t) {
                                return e._hideModal(t);
                            }),
                                h(this._element, i);
                        } else this._hideModal();
                    }
                }),
                (r.dispose = function () {
                    [window, this._element, this._dialog].forEach(function (t) {
                        return H.off(t, ".bs.modal");
                    }),
                        t.prototype.dispose.call(this),
                        H.off(document, "focusin.bs.modal"),
                        (this._config = null),
                        (this._dialog = null),
                        (this._backdrop = null),
                        (this._isShown = null),
                        (this._isBodyOverflowing = null),
                        (this._ignoreBackdropClick = null),
                        (this._isTransitioning = null),
                        (this._scrollbarWidth = null);
                }),
                (r.handleUpdate = function () {
                    this._adjustDialog();
                }),
                (r._getConfig = function (t) {
                    return (t = n({}, ke, t)), p("modal", t, Oe), t;
                }),
                (r._showElement = function (t) {
                    var e = this,
                        n = this._element.classList.contains("fade"),
                        i = q.findOne(".modal-body", this._dialog);
                    (this._element.parentNode && this._element.parentNode.nodeType === Node.ELEMENT_NODE) || document.body.appendChild(this._element),
                        (this._element.style.display = "block"),
                        this._element.removeAttribute("aria-hidden"),
                        this._element.setAttribute("aria-modal", !0),
                        this._element.setAttribute("role", "dialog"),
                        (this._element.scrollTop = 0),
                        i && (i.scrollTop = 0),
                        n && v(this._element),
                        this._element.classList.add("show"),
                        this._config.focus && this._enforceFocus();
                    var o = function () {
                        e._config.focus && e._element.focus(), (e._isTransitioning = !1), H.trigger(e._element, "shown.bs.modal", { relatedTarget: t });
                    };
                    if (n) {
                        var r = u(this._dialog);
                        H.one(this._dialog, "transitionend", o), h(this._dialog, r);
                    } else o();
                }),
                (r._enforceFocus = function () {
                    var t = this;
                    H.off(document, "focusin.bs.modal"),
                        H.on(document, "focusin.bs.modal", function (e) {
                            document === e.target || t._element === e.target || t._element.contains(e.target) || t._element.focus();
                        });
                }),
                (r._setEscapeEvent = function () {
                    var t = this;
                    this._isShown
                        ? H.on(this._element, "keydown.dismiss.bs.modal", function (e) {
                              t._config.keyboard && "Escape" === e.key ? (e.preventDefault(), t.hide()) : t._config.keyboard || "Escape" !== e.key || t._triggerBackdropTransition();
                          })
                        : H.off(this._element, "keydown.dismiss.bs.modal");
                }),
                (r._setResizeEvent = function () {
                    var t = this;
                    this._isShown
                        ? H.on(window, "resize.bs.modal", function () {
                              return t._adjustDialog();
                          })
                        : H.off(window, "resize.bs.modal");
                }),
                (r._hideModal = function () {
                    var t = this;
                    (this._element.style.display = "none"),
                        this._element.setAttribute("aria-hidden", !0),
                        this._element.removeAttribute("aria-modal"),
                        this._element.removeAttribute("role"),
                        (this._isTransitioning = !1),
                        this._showBackdrop(function () {
                            document.body.classList.remove("modal-open"), t._resetAdjustments(), t._resetScrollbar(), H.trigger(t._element, "hidden.bs.modal");
                        });
                }),
                (r._removeBackdrop = function () {
                    this._backdrop.parentNode.removeChild(this._backdrop), (this._backdrop = null);
                }),
                (r._showBackdrop = function (t) {
                    var e = this,
                        n = this._element.classList.contains("fade") ? "fade" : "";
                    if (this._isShown && this._config.backdrop) {
                        if (
                            ((this._backdrop = document.createElement("div")),
                            (this._backdrop.className = "modal-backdrop"),
                            n && this._backdrop.classList.add(n),
                            document.body.appendChild(this._backdrop),
                            H.on(this._element, "click.dismiss.bs.modal", function (t) {
                                e._ignoreBackdropClick ? (e._ignoreBackdropClick = !1) : t.target === t.currentTarget && ("static" === e._config.backdrop ? e._triggerBackdropTransition() : e.hide());
                            }),
                            n && v(this._backdrop),
                            this._backdrop.classList.add("show"),
                            !n)
                        )
                            return void t();
                        var i = u(this._backdrop);
                        H.one(this._backdrop, "transitionend", t), h(this._backdrop, i);
                    } else if (!this._isShown && this._backdrop) {
                        this._backdrop.classList.remove("show");
                        var o = function () {
                            e._removeBackdrop(), t();
                        };
                        if (this._element.classList.contains("fade")) {
                            var r = u(this._backdrop);
                            H.one(this._backdrop, "transitionend", o), h(this._backdrop, r);
                        } else o();
                    } else t();
                }),
                (r._triggerBackdropTransition = function () {
                    var t = this;
                    if (!H.trigger(this._element, "hidePrevented.bs.modal").defaultPrevented) {
                        var e = this._element.scrollHeight > document.documentElement.clientHeight;
                        e || (this._element.style.overflowY = "hidden"), this._element.classList.add("modal-static");
                        var n = u(this._dialog);
                        H.off(this._element, "transitionend"),
                            H.one(this._element, "transitionend", function () {
                                t._element.classList.remove("modal-static"),
                                    e ||
                                        (H.one(t._element, "transitionend", function () {
                                            t._element.style.overflowY = "";
                                        }),
                                        h(t._element, n));
                            }),
                            h(this._element, n),
                            this._element.focus();
                    }
                }),
                (r._adjustDialog = function () {
                    var t = this._element.scrollHeight > document.documentElement.clientHeight;
                    ((!this._isBodyOverflowing && t && !y) || (this._isBodyOverflowing && !t && y)) && (this._element.style.paddingLeft = this._scrollbarWidth + "px"),
                        ((this._isBodyOverflowing && !t && !y) || (!this._isBodyOverflowing && t && y)) && (this._element.style.paddingRight = this._scrollbarWidth + "px");
                }),
                (r._resetAdjustments = function () {
                    (this._element.style.paddingLeft = ""), (this._element.style.paddingRight = "");
                }),
                (r._checkScrollbar = function () {
                    var t = document.body.getBoundingClientRect();
                    (this._isBodyOverflowing = Math.round(t.left + t.right) < window.innerWidth), (this._scrollbarWidth = this._getScrollbarWidth());
                }),
                (r._setScrollbar = function () {
                    var t = this;
                    if (this._isBodyOverflowing) {
                        q.find(".fixed-top, .fixed-bottom, .is-fixed, .sticky-top").forEach(function (e) {
                            var n = e.style.paddingRight,
                                i = window.getComputedStyle(e)["padding-right"];
                            Y.setDataAttribute(e, "padding-right", n), (e.style.paddingRight = Number.parseFloat(i) + t._scrollbarWidth + "px");
                        }),
                            q.find(".sticky-top").forEach(function (e) {
                                var n = e.style.marginRight,
                                    i = window.getComputedStyle(e)["margin-right"];
                                Y.setDataAttribute(e, "margin-right", n), (e.style.marginRight = Number.parseFloat(i) - t._scrollbarWidth + "px");
                            });
                        var e = document.body.style.paddingRight,
                            n = window.getComputedStyle(document.body)["padding-right"];
                        Y.setDataAttribute(document.body, "padding-right", e), (document.body.style.paddingRight = Number.parseFloat(n) + this._scrollbarWidth + "px");
                    }
                    document.body.classList.add("modal-open");
                }),
                (r._resetScrollbar = function () {
                    q.find(".fixed-top, .fixed-bottom, .is-fixed, .sticky-top").forEach(function (t) {
                        var e = Y.getDataAttribute(t, "padding-right");
                        void 0 !== e && (Y.removeDataAttribute(t, "padding-right"), (t.style.paddingRight = e));
                    }),
                        q.find(".sticky-top").forEach(function (t) {
                            var e = Y.getDataAttribute(t, "margin-right");
                            void 0 !== e && (Y.removeDataAttribute(t, "margin-right"), (t.style.marginRight = e));
                        });
                    var t = Y.getDataAttribute(document.body, "padding-right");
                    void 0 === t ? (document.body.style.paddingRight = "") : (Y.removeDataAttribute(document.body, "padding-right"), (document.body.style.paddingRight = t));
                }),
                (r._getScrollbarWidth = function () {
                    var t = document.createElement("div");
                    (t.className = "modal-scrollbar-measure"), document.body.appendChild(t);
                    var e = t.getBoundingClientRect().width - t.clientWidth;
                    return document.body.removeChild(t), e;
                }),
                (o.jQueryInterface = function (t, e) {
                    return this.each(function () {
                        var i = T(this, "bs.modal"),
                            r = n({}, ke, Y.getDataAttributes(this), "object" == typeof t && t ? t : {});
                        if ((i || (i = new o(this, r)), "string" == typeof t)) {
                            if (void 0 === i[t]) throw new TypeError('No method named "' + t + '"');
                            i[t](e);
                        }
                    });
                }),
                e(o, null, [
                    {
                        key: "Default",
                        get: function () {
                            return ke;
                        },
                    },
                    {
                        key: "DATA_KEY",
                        get: function () {
                            return "bs.modal";
                        },
                    },
                ]),
                o
            );
        })(R);
    H.on(document, "click.bs.modal.data-api", '[data-bs-toggle="modal"]', function (t) {
        var e = this,
            i = c(this);
        ("A" !== this.tagName && "AREA" !== this.tagName) || t.preventDefault(),
            H.one(i, "show.bs.modal", function (t) {
                t.defaultPrevented ||
                    H.one(i, "hidden.bs.modal", function () {
                        g(e) && e.focus();
                    });
            });
        var o = T(i, "bs.modal");
        if (!o) {
            var r = n({}, Y.getDataAttributes(i), Y.getDataAttributes(this));
            o = new Le(i, r);
        }
        o.show(this);
    }),
        b(function () {
            var t = _();
            if (t) {
                var e = t.fn.modal;
                (t.fn.modal = Le.jQueryInterface),
                    (t.fn.modal.Constructor = Le),
                    (t.fn.modal.noConflict = function () {
                        return (t.fn.modal = e), Le.jQueryInterface;
                    });
            }
        });
    var Ae = new Set(["background", "cite", "href", "itemtype", "longdesc", "poster", "src", "xlink:href"]),
        Ce = /^(?:(?:https?|mailto|ftp|tel|file):|[^#&/:?]*(?:[#/?]|$))/gi,
        De = /^data:(?:image\/(?:bmp|gif|jpeg|jpg|png|tiff|webp)|video\/(?:mpeg|mp4|ogg|webm)|audio\/(?:mp3|oga|ogg|opus));base64,[\d+/a-z]+=*$/i,
        xe = {
            "*": ["class", "dir", "id", "lang", "role", /^aria-[\w-]*$/i],
            a: ["target", "href", "title", "rel"],
            area: [],
            b: [],
            br: [],
            col: [],
            code: [],
            div: [],
            em: [],
            hr: [],
            h1: [],
            h2: [],
            h3: [],
            h4: [],
            h5: [],
            h6: [],
            i: [],
            img: ["src", "srcset", "alt", "title", "width", "height"],
            li: [],
            ol: [],
            p: [],
            pre: [],
            s: [],
            small: [],
            span: [],
            sub: [],
            sup: [],
            strong: [],
            u: [],
            ul: [],
        };
    function Se(t, e, n) {
        var i;
        if (!t.length) return t;
        if (n && "function" == typeof n) return n(t);
        for (
            var o = new window.DOMParser().parseFromString(t, "text/html"),
                r = Object.keys(e),
                s = (i = []).concat.apply(i, o.body.querySelectorAll("*")),
                a = function (t, n) {
                    var i,
                        o = s[t],
                        a = o.nodeName.toLowerCase();
                    if (!r.includes(a)) return o.parentNode.removeChild(o), "continue";
                    var l = (i = []).concat.apply(i, o.attributes),
                        c = [].concat(e["*"] || [], e[a] || []);
                    l.forEach(function (t) {
                        (function (t, e) {
                            var n = t.nodeName.toLowerCase();
                            if (e.includes(n)) return !Ae.has(n) || Boolean(t.nodeValue.match(Ce) || t.nodeValue.match(De));
                            for (
                                var i = e.filter(function (t) {
                                        return t instanceof RegExp;
                                    }),
                                    o = 0,
                                    r = i.length;
                                o < r;
                                o++
                            )
                                if (n.match(i[o])) return !0;
                            return !1;
                        })(t, c) || o.removeAttribute(t.nodeName);
                    });
                },
                l = 0,
                c = s.length;
            l < c;
            l++
        )
            a(l);
        return o.body.innerHTML;
    }
    var je = "tooltip",
        Ne = new RegExp("(^|\\s)bs-tooltip\\S+", "g"),
        Ie = new Set(["sanitize", "allowList", "sanitizeFn"]),
        Pe = {
            animation: "boolean",
            template: "string",
            title: "(string|element|function)",
            trigger: "string",
            delay: "(number|object)",
            html: "boolean",
            selector: "(string|boolean)",
            placement: "(string|function)",
            container: "(string|element|boolean)",
            fallbackPlacements: "(null|array)",
            boundary: "(string|element)",
            customClass: "(string|function)",
            sanitize: "boolean",
            sanitizeFn: "(null|function)",
            allowList: "object",
            popperConfig: "(null|object)",
        },
        Me = { AUTO: "auto", TOP: "top", RIGHT: y ? "left" : "right", BOTTOM: "bottom", LEFT: y ? "right" : "left" },
        Be = {
            animation: !0,
            template: '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
            trigger: "hover focus",
            title: "",
            delay: 0,
            html: !1,
            selector: !1,
            placement: "top",
            container: !1,
            fallbackPlacements: null,
            boundary: "clippingParents",
            customClass: "",
            sanitize: !0,
            sanitizeFn: null,
            allowList: xe,
            popperConfig: null,
        },
        He = {
            HIDE: "hide.bs.tooltip",
            HIDDEN: "hidden.bs.tooltip",
            SHOW: "show.bs.tooltip",
            SHOWN: "shown.bs.tooltip",
            INSERTED: "inserted.bs.tooltip",
            CLICK: "click.bs.tooltip",
            FOCUSIN: "focusin.bs.tooltip",
            FOCUSOUT: "focusout.bs.tooltip",
            MOUSEENTER: "mouseenter.bs.tooltip",
            MOUSELEAVE: "mouseleave.bs.tooltip",
        },
        Re = (function (t) {
            function o(e, n) {
                var i;
                if (void 0 === de) throw new TypeError("Bootstrap's tooltips require Popper (https://popper.js.org)");
                return ((i = t.call(this, e) || this)._isEnabled = !0), (i._timeout = 0), (i._hoverState = ""), (i._activeTrigger = {}), (i._popper = null), (i.config = i._getConfig(n)), (i.tip = null), i._setListeners(), i;
            }
            i(o, t);
            var r = o.prototype;
            return (
                (r.enable = function () {
                    this._isEnabled = !0;
                }),
                (r.disable = function () {
                    this._isEnabled = !1;
                }),
                (r.toggleEnabled = function () {
                    this._isEnabled = !this._isEnabled;
                }),
                (r.toggle = function (t) {
                    if (this._isEnabled)
                        if (t) {
                            var e = this.constructor.DATA_KEY,
                                n = T(t.delegateTarget, e);
                            n || ((n = new this.constructor(t.delegateTarget, this._getDelegateConfig())), E(t.delegateTarget, e, n)),
                                (n._activeTrigger.click = !n._activeTrigger.click),
                                n._isWithActiveTrigger() ? n._enter(null, n) : n._leave(null, n);
                        } else {
                            if (this.getTipElement().classList.contains("show")) return void this._leave(null, this);
                            this._enter(null, this);
                        }
                }),
                (r.dispose = function () {
                    clearTimeout(this._timeout),
                        H.off(this._element, this.constructor.EVENT_KEY),
                        H.off(this._element.closest(".modal"), "hide.bs.modal", this._hideModalHandler),
                        this.tip && this.tip.parentNode.removeChild(this.tip),
                        (this._isEnabled = null),
                        (this._timeout = null),
                        (this._hoverState = null),
                        (this._activeTrigger = null),
                        this._popper && this._popper.destroy(),
                        (this._popper = null),
                        (this.config = null),
                        (this.tip = null),
                        t.prototype.dispose.call(this);
                }),
                (r.show = function () {
                    var t = this;
                    if ("none" === this._element.style.display) throw new Error("Please use show on visible elements");
                    if (this.isWithContent() && this._isEnabled) {
                        var e = H.trigger(this._element, this.constructor.Event.SHOW),
                            n = (function t(e) {
                                if (!document.documentElement.attachShadow) return null;
                                if ("function" == typeof e.getRootNode) {
                                    var n = e.getRootNode();
                                    return n instanceof ShadowRoot ? n : null;
                                }
                                return e instanceof ShadowRoot ? e : e.parentNode ? t(e.parentNode) : null;
                            })(this._element),
                            i = null === n ? this._element.ownerDocument.documentElement.contains(this._element) : n.contains(this._element);
                        if (e.defaultPrevented || !i) return;
                        var o = this.getTipElement(),
                            r = s(this.constructor.NAME);
                        o.setAttribute("id", r), this._element.setAttribute("aria-describedby", r), this.setContent(), this.config.animation && o.classList.add("fade");
                        var a = "function" == typeof this.config.placement ? this.config.placement.call(this, o, this._element) : this.config.placement,
                            l = this._getAttachment(a);
                        this._addAttachmentClass(l);
                        var c = this._getContainer();
                        E(o, this.constructor.DATA_KEY, this),
                            this._element.ownerDocument.documentElement.contains(this.tip) || c.appendChild(o),
                            H.trigger(this._element, this.constructor.Event.INSERTED),
                            (this._popper = fe(this._element, o, this._getPopperConfig(l))),
                            o.classList.add("show");
                        var f,
                            d,
                            p = "function" == typeof this.config.customClass ? this.config.customClass() : this.config.customClass;
                        if (p) (f = o.classList).add.apply(f, p.split(" "));
                        if ("ontouchstart" in document.documentElement)
                            (d = []).concat.apply(d, document.body.children).forEach(function (t) {
                                H.on(t, "mouseover", function () {});
                            });
                        var g = function () {
                            var e = t._hoverState;
                            (t._hoverState = null), H.trigger(t._element, t.constructor.Event.SHOWN), "out" === e && t._leave(null, t);
                        };
                        if (this.tip.classList.contains("fade")) {
                            var m = u(this.tip);
                            H.one(this.tip, "transitionend", g), h(this.tip, m);
                        } else g();
                    }
                }),
                (r.hide = function () {
                    var t = this;
                    if (this._popper) {
                        var e = this.getTipElement(),
                            n = function () {
                                "show" !== t._hoverState && e.parentNode && e.parentNode.removeChild(e),
                                    t._cleanTipClass(),
                                    t._element.removeAttribute("aria-describedby"),
                                    H.trigger(t._element, t.constructor.Event.HIDDEN),
                                    t._popper && (t._popper.destroy(), (t._popper = null));
                            };
                        if (!H.trigger(this._element, this.constructor.Event.HIDE).defaultPrevented) {
                            var i;
                            if ((e.classList.remove("show"), "ontouchstart" in document.documentElement))
                                (i = []).concat.apply(i, document.body.children).forEach(function (t) {
                                    return H.off(t, "mouseover", m);
                                });
                            if (((this._activeTrigger.click = !1), (this._activeTrigger.focus = !1), (this._activeTrigger.hover = !1), this.tip.classList.contains("fade"))) {
                                var o = u(e);
                                H.one(e, "transitionend", n), h(e, o);
                            } else n();
                            this._hoverState = "";
                        }
                    }
                }),
                (r.update = function () {
                    null !== this._popper && this._popper.update();
                }),
                (r.isWithContent = function () {
                    return Boolean(this.getTitle());
                }),
                (r.getTipElement = function () {
                    if (this.tip) return this.tip;
                    var t = document.createElement("div");
                    return (t.innerHTML = this.config.template), (this.tip = t.children[0]), this.tip;
                }),
                (r.setContent = function () {
                    var t = this.getTipElement();
                    this.setElementContent(q.findOne(".tooltip-inner", t), this.getTitle()), t.classList.remove("fade", "show");
                }),
                (r.setElementContent = function (t, e) {
                    if (null !== t)
                        return "object" == typeof e && d(e)
                            ? (e.jquery && (e = e[0]), void (this.config.html ? e.parentNode !== t && ((t.innerHTML = ""), t.appendChild(e)) : (t.textContent = e.textContent)))
                            : void (this.config.html ? (this.config.sanitize && (e = Se(e, this.config.allowList, this.config.sanitizeFn)), (t.innerHTML = e)) : (t.textContent = e));
                }),
                (r.getTitle = function () {
                    var t = this._element.getAttribute("data-bs-original-title");
                    return t || (t = "function" == typeof this.config.title ? this.config.title.call(this._element) : this.config.title), t;
                }),
                (r.updateAttachment = function (t) {
                    return "right" === t ? "end" : "left" === t ? "start" : t;
                }),
                (r._getPopperConfig = function (t) {
                    var e = this,
                        i = { name: "flip", options: { altBoundary: !0 } };
                    return (
                        this.config.fallbackPlacements && (i.options.fallbackPlacements = this.config.fallbackPlacements),
                        n(
                            {},
                            {
                                placement: t,
                                modifiers: [
                                    i,
                                    { name: "preventOverflow", options: { rootBoundary: this.config.boundary } },
                                    { name: "arrow", options: { element: "." + this.constructor.NAME + "-arrow" } },
                                    {
                                        name: "onChange",
                                        enabled: !0,
                                        phase: "afterWrite",
                                        fn: function (t) {
                                            return e._handlePopperPlacementChange(t);
                                        },
                                    },
                                ],
                                onFirstUpdate: function (t) {
                                    t.options.placement !== t.placement && e._handlePopperPlacementChange(t);
                                },
                            },
                            this.config.popperConfig
                        )
                    );
                }),
                (r._addAttachmentClass = function (t) {
                    this.getTipElement().classList.add("bs-tooltip-" + this.updateAttachment(t));
                }),
                (r._getContainer = function () {
                    return !1 === this.config.container ? document.body : d(this.config.container) ? this.config.container : q.findOne(this.config.container);
                }),
                (r._getAttachment = function (t) {
                    return Me[t.toUpperCase()];
                }),
                (r._setListeners = function () {
                    var t = this;
                    this.config.trigger.split(" ").forEach(function (e) {
                        if ("click" === e)
                            H.on(t._element, t.constructor.Event.CLICK, t.config.selector, function (e) {
                                return t.toggle(e);
                            });
                        else if ("manual" !== e) {
                            var n = "hover" === e ? t.constructor.Event.MOUSEENTER : t.constructor.Event.FOCUSIN,
                                i = "hover" === e ? t.constructor.Event.MOUSELEAVE : t.constructor.Event.FOCUSOUT;
                            H.on(t._element, n, t.config.selector, function (e) {
                                return t._enter(e);
                            }),
                                H.on(t._element, i, t.config.selector, function (e) {
                                    return t._leave(e);
                                });
                        }
                    }),
                        (this._hideModalHandler = function () {
                            t._element && t.hide();
                        }),
                        H.on(this._element.closest(".modal"), "hide.bs.modal", this._hideModalHandler),
                        this.config.selector ? (this.config = n({}, this.config, { trigger: "manual", selector: "" })) : this._fixTitle();
                }),
                (r._fixTitle = function () {
                    var t = this._element.getAttribute("title"),
                        e = typeof this._element.getAttribute("data-bs-original-title");
                    (t || "string" !== e) &&
                        (this._element.setAttribute("data-bs-original-title", t || ""),
                        !t || this._element.getAttribute("aria-label") || this._element.textContent || this._element.setAttribute("aria-label", t),
                        this._element.setAttribute("title", ""));
                }),
                (r._enter = function (t, e) {
                    var n = this.constructor.DATA_KEY;
                    (e = e || T(t.delegateTarget, n)) || ((e = new this.constructor(t.delegateTarget, this._getDelegateConfig())), E(t.delegateTarget, n, e)),
                        t && (e._activeTrigger["focusin" === t.type ? "focus" : "hover"] = !0),
                        e.getTipElement().classList.contains("show") || "show" === e._hoverState
                            ? (e._hoverState = "show")
                            : (clearTimeout(e._timeout),
                              (e._hoverState = "show"),
                              e.config.delay && e.config.delay.show
                                  ? (e._timeout = setTimeout(function () {
                                        "show" === e._hoverState && e.show();
                                    }, e.config.delay.show))
                                  : e.show());
                }),
                (r._leave = function (t, e) {
                    var n = this.constructor.DATA_KEY;
                    (e = e || T(t.delegateTarget, n)) || ((e = new this.constructor(t.delegateTarget, this._getDelegateConfig())), E(t.delegateTarget, n, e)),
                        t && (e._activeTrigger["focusout" === t.type ? "focus" : "hover"] = !1),
                        e._isWithActiveTrigger() ||
                            (clearTimeout(e._timeout),
                            (e._hoverState = "out"),
                            e.config.delay && e.config.delay.hide
                                ? (e._timeout = setTimeout(function () {
                                      "out" === e._hoverState && e.hide();
                                  }, e.config.delay.hide))
                                : e.hide());
                }),
                (r._isWithActiveTrigger = function () {
                    for (var t in this._activeTrigger) if (this._activeTrigger[t]) return !0;
                    return !1;
                }),
                (r._getConfig = function (t) {
                    var e = Y.getDataAttributes(this._element);
                    return (
                        Object.keys(e).forEach(function (t) {
                            Ie.has(t) && delete e[t];
                        }),
                        t && "object" == typeof t.container && t.container.jquery && (t.container = t.container[0]),
                        "number" == typeof (t = n({}, this.constructor.Default, e, "object" == typeof t && t ? t : {})).delay && (t.delay = { show: t.delay, hide: t.delay }),
                        "number" == typeof t.title && (t.title = t.title.toString()),
                        "number" == typeof t.content && (t.content = t.content.toString()),
                        p(je, t, this.constructor.DefaultType),
                        t.sanitize && (t.template = Se(t.template, t.allowList, t.sanitizeFn)),
                        t
                    );
                }),
                (r._getDelegateConfig = function () {
                    var t = {};
                    if (this.config) for (var e in this.config) this.constructor.Default[e] !== this.config[e] && (t[e] = this.config[e]);
                    return t;
                }),
                (r._cleanTipClass = function () {
                    var t = this.getTipElement(),
                        e = t.getAttribute("class").match(Ne);
                    null !== e &&
                        e.length > 0 &&
                        e
                            .map(function (t) {
                                return t.trim();
                            })
                            .forEach(function (e) {
                                return t.classList.remove(e);
                            });
                }),
                (r._handlePopperPlacementChange = function (t) {
                    var e = t.state;
                    e && ((this.tip = e.elements.popper), this._cleanTipClass(), this._addAttachmentClass(this._getAttachment(e.placement)));
                }),
                (o.jQueryInterface = function (t) {
                    return this.each(function () {
                        var e = T(this, "bs.tooltip"),
                            n = "object" == typeof t && t;
                        if ((e || !/dispose|hide/.test(t)) && (e || (e = new o(this, n)), "string" == typeof t)) {
                            if (void 0 === e[t]) throw new TypeError('No method named "' + t + '"');
                            e[t]();
                        }
                    });
                }),
                e(o, null, [
                    {
                        key: "Default",
                        get: function () {
                            return Be;
                        },
                    },
                    {
                        key: "NAME",
                        get: function () {
                            return je;
                        },
                    },
                    {
                        key: "DATA_KEY",
                        get: function () {
                            return "bs.tooltip";
                        },
                    },
                    {
                        key: "Event",
                        get: function () {
                            return He;
                        },
                    },
                    {
                        key: "EVENT_KEY",
                        get: function () {
                            return ".bs.tooltip";
                        },
                    },
                    {
                        key: "DefaultType",
                        get: function () {
                            return Pe;
                        },
                    },
                ]),
                o
            );
        })(R);
    b(function () {
        var t = _();
        if (t) {
            var e = t.fn[je];
            (t.fn[je] = Re.jQueryInterface),
                (t.fn[je].Constructor = Re),
                (t.fn[je].noConflict = function () {
                    return (t.fn[je] = e), Re.jQueryInterface;
                });
        }
    });
    var We = "popover",
        Ke = new RegExp("(^|\\s)bs-popover\\S+", "g"),
        Qe = n({}, Re.Default, { placement: "right", trigger: "click", content: "", template: '<div class="popover" role="tooltip"><div class="popover-arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>' }),
        Ue = n({}, Re.DefaultType, { content: "(string|element|function)" }),
        Fe = {
            HIDE: "hide.bs.popover",
            HIDDEN: "hidden.bs.popover",
            SHOW: "show.bs.popover",
            SHOWN: "shown.bs.popover",
            INSERTED: "inserted.bs.popover",
            CLICK: "click.bs.popover",
            FOCUSIN: "focusin.bs.popover",
            FOCUSOUT: "focusout.bs.popover",
            MOUSEENTER: "mouseenter.bs.popover",
            MOUSELEAVE: "mouseleave.bs.popover",
        },
        Ye = (function (t) {
            function n() {
                return t.apply(this, arguments) || this;
            }
            i(n, t);
            var o = n.prototype;
            return (
                (o.isWithContent = function () {
                    return this.getTitle() || this._getContent();
                }),
                (o.setContent = function () {
                    var t = this.getTipElement();
                    this.setElementContent(q.findOne(".popover-header", t), this.getTitle());
                    var e = this._getContent();
                    "function" == typeof e && (e = e.call(this._element)), this.setElementContent(q.findOne(".popover-body", t), e), t.classList.remove("fade", "show");
                }),
                (o._addAttachmentClass = function (t) {
                    this.getTipElement().classList.add("bs-popover-" + this.updateAttachment(t));
                }),
                (o._getContent = function () {
                    return this._element.getAttribute("data-bs-content") || this.config.content;
                }),
                (o._cleanTipClass = function () {
                    var t = this.getTipElement(),
                        e = t.getAttribute("class").match(Ke);
                    null !== e &&
                        e.length > 0 &&
                        e
                            .map(function (t) {
                                return t.trim();
                            })
                            .forEach(function (e) {
                                return t.classList.remove(e);
                            });
                }),
                (n.jQueryInterface = function (t) {
                    return this.each(function () {
                        var e = T(this, "bs.popover"),
                            i = "object" == typeof t ? t : null;
                        if ((e || !/dispose|hide/.test(t)) && (e || ((e = new n(this, i)), E(this, "bs.popover", e)), "string" == typeof t)) {
                            if (void 0 === e[t]) throw new TypeError('No method named "' + t + '"');
                            e[t]();
                        }
                    });
                }),
                e(n, null, [
                    {
                        key: "Default",
                        get: function () {
                            return Qe;
                        },
                    },
                    {
                        key: "NAME",
                        get: function () {
                            return We;
                        },
                    },
                    {
                        key: "DATA_KEY",
                        get: function () {
                            return "bs.popover";
                        },
                    },
                    {
                        key: "Event",
                        get: function () {
                            return Fe;
                        },
                    },
                    {
                        key: "EVENT_KEY",
                        get: function () {
                            return ".bs.popover";
                        },
                    },
                    {
                        key: "DefaultType",
                        get: function () {
                            return Ue;
                        },
                    },
                ]),
                n
            );
        })(Re);
    b(function () {
        var t = _();
        if (t) {
            var e = t.fn[We];
            (t.fn[We] = Ye.jQueryInterface),
                (t.fn[We].Constructor = Ye),
                (t.fn[We].noConflict = function () {
                    return (t.fn[We] = e), Ye.jQueryInterface;
                });
        }
    });
    var qe = "scrollspy",
        ze = { offset: 10, method: "auto", target: "" },
        Ve = { offset: "number", method: "string", target: "(string|element)" },
        Xe = (function (t) {
            function o(e, n) {
                var i;
                return (
                    ((i = t.call(this, e) || this)._scrollElement = "BODY" === e.tagName ? window : e),
                    (i._config = i._getConfig(n)),
                    (i._selector = i._config.target + " .nav-link, " + i._config.target + " .list-group-item, " + i._config.target + " .dropdown-item"),
                    (i._offsets = []),
                    (i._targets = []),
                    (i._activeTarget = null),
                    (i._scrollHeight = 0),
                    H.on(i._scrollElement, "scroll.bs.scrollspy", function (t) {
                        return i._process(t);
                    }),
                    i.refresh(),
                    i._process(),
                    i
                );
            }
            i(o, t);
            var r = o.prototype;
            return (
                (r.refresh = function () {
                    var t = this,
                        e = this._scrollElement === this._scrollElement.window ? "offset" : "position",
                        n = "auto" === this._config.method ? e : this._config.method,
                        i = "position" === n ? this._getScrollTop() : 0;
                    (this._offsets = []),
                        (this._targets = []),
                        (this._scrollHeight = this._getScrollHeight()),
                        q
                            .find(this._selector)
                            .map(function (t) {
                                var e = l(t),
                                    o = e ? q.findOne(e) : null;
                                if (o) {
                                    var r = o.getBoundingClientRect();
                                    if (r.width || r.height) return [Y[n](o).top + i, e];
                                }
                                return null;
                            })
                            .filter(function (t) {
                                return t;
                            })
                            .sort(function (t, e) {
                                return t[0] - e[0];
                            })
                            .forEach(function (e) {
                                t._offsets.push(e[0]), t._targets.push(e[1]);
                            });
                }),
                (r.dispose = function () {
                    t.prototype.dispose.call(this),
                        H.off(this._scrollElement, ".bs.scrollspy"),
                        (this._scrollElement = null),
                        (this._config = null),
                        (this._selector = null),
                        (this._offsets = null),
                        (this._targets = null),
                        (this._activeTarget = null),
                        (this._scrollHeight = null);
                }),
                (r._getConfig = function (t) {
                    if ("string" != typeof (t = n({}, ze, "object" == typeof t && t ? t : {})).target && d(t.target)) {
                        var e = t.target.id;
                        e || ((e = s(qe)), (t.target.id = e)), (t.target = "#" + e);
                    }
                    return p(qe, t, Ve), t;
                }),
                (r._getScrollTop = function () {
                    return this._scrollElement === window ? this._scrollElement.pageYOffset : this._scrollElement.scrollTop;
                }),
                (r._getScrollHeight = function () {
                    return this._scrollElement.scrollHeight || Math.max(document.body.scrollHeight, document.documentElement.scrollHeight);
                }),
                (r._getOffsetHeight = function () {
                    return this._scrollElement === window ? window.innerHeight : this._scrollElement.getBoundingClientRect().height;
                }),
                (r._process = function () {
                    var t = this._getScrollTop() + this._config.offset,
                        e = this._getScrollHeight(),
                        n = this._config.offset + e - this._getOffsetHeight();
                    if ((this._scrollHeight !== e && this.refresh(), t >= n)) {
                        var i = this._targets[this._targets.length - 1];
                        this._activeTarget !== i && this._activate(i);
                    } else {
                        if (this._activeTarget && t < this._offsets[0] && this._offsets[0] > 0) return (this._activeTarget = null), void this._clear();
                        for (var o = this._offsets.length; o--; ) {
                            this._activeTarget !== this._targets[o] && t >= this._offsets[o] && (void 0 === this._offsets[o + 1] || t < this._offsets[o + 1]) && this._activate(this._targets[o]);
                        }
                    }
                }),
                (r._activate = function (t) {
                    (this._activeTarget = t), this._clear();
                    var e = this._selector.split(",").map(function (e) {
                            return e + '[data-bs-target="' + t + '"],' + e + '[href="' + t + '"]';
                        }),
                        n = q.findOne(e.join(","));
                    n.classList.contains("dropdown-item")
                        ? (q.findOne(".dropdown-toggle", n.closest(".dropdown")).classList.add("active"), n.classList.add("active"))
                        : (n.classList.add("active"),
                          q.parents(n, ".nav, .list-group").forEach(function (t) {
                              q.prev(t, ".nav-link, .list-group-item").forEach(function (t) {
                                  return t.classList.add("active");
                              }),
                                  q.prev(t, ".nav-item").forEach(function (t) {
                                      q.children(t, ".nav-link").forEach(function (t) {
                                          return t.classList.add("active");
                                      });
                                  });
                          })),
                        H.trigger(this._scrollElement, "activate.bs.scrollspy", { relatedTarget: t });
                }),
                (r._clear = function () {
                    q.find(this._selector)
                        .filter(function (t) {
                            return t.classList.contains("active");
                        })
                        .forEach(function (t) {
                            return t.classList.remove("active");
                        });
                }),
                (o.jQueryInterface = function (t) {
                    return this.each(function () {
                        var e = T(this, "bs.scrollspy");
                        if ((e || (e = new o(this, "object" == typeof t && t)), "string" == typeof t)) {
                            if (void 0 === e[t]) throw new TypeError('No method named "' + t + '"');
                            e[t]();
                        }
                    });
                }),
                e(o, null, [
                    {
                        key: "Default",
                        get: function () {
                            return ze;
                        },
                    },
                    {
                        key: "DATA_KEY",
                        get: function () {
                            return "bs.scrollspy";
                        },
                    },
                ]),
                o
            );
        })(R);
    H.on(window, "load.bs.scrollspy.data-api", function () {
        q.find('[data-bs-spy="scroll"]').forEach(function (t) {
            return new Xe(t, Y.getDataAttributes(t));
        });
    }),
        b(function () {
            var t = _();
            if (t) {
                var e = t.fn[qe];
                (t.fn[qe] = Xe.jQueryInterface),
                    (t.fn[qe].Constructor = Xe),
                    (t.fn[qe].noConflict = function () {
                        return (t.fn[qe] = e), Xe.jQueryInterface;
                    });
            }
        });
    var $e = (function (t) {
        function n() {
            return t.apply(this, arguments) || this;
        }
        i(n, t);
        var o = n.prototype;
        return (
            (o.show = function () {
                var t = this;
                if (!((this._element.parentNode && this._element.parentNode.nodeType === Node.ELEMENT_NODE && this._element.classList.contains("active")) || this._element.classList.contains("disabled"))) {
                    var e,
                        n = c(this._element),
                        i = this._element.closest(".nav, .list-group");
                    if (i) {
                        var o = "UL" === i.nodeName || "OL" === i.nodeName ? ":scope > li > .active" : ".active";
                        e = (e = q.find(o, i))[e.length - 1];
                    }
                    var r = null;
                    if ((e && (r = H.trigger(e, "hide.bs.tab", { relatedTarget: this._element })), !(H.trigger(this._element, "show.bs.tab", { relatedTarget: e }).defaultPrevented || (null !== r && r.defaultPrevented)))) {
                        this._activate(this._element, i);
                        var s = function () {
                            H.trigger(e, "hidden.bs.tab", { relatedTarget: t._element }), H.trigger(t._element, "shown.bs.tab", { relatedTarget: e });
                        };
                        n ? this._activate(n, n.parentNode, s) : s();
                    }
                }
            }),
            (o._activate = function (t, e, n) {
                var i = this,
                    o = (!e || ("UL" !== e.nodeName && "OL" !== e.nodeName) ? q.children(e, ".active") : q.find(":scope > li > .active", e))[0],
                    r = n && o && o.classList.contains("fade"),
                    s = function () {
                        return i._transitionComplete(t, o, n);
                    };
                if (o && r) {
                    var a = u(o);
                    o.classList.remove("show"), H.one(o, "transitionend", s), h(o, a);
                } else s();
            }),
            (o._transitionComplete = function (t, e, n) {
                if (e) {
                    e.classList.remove("active");
                    var i = q.findOne(":scope > .dropdown-menu .active", e.parentNode);
                    i && i.classList.remove("active"), "tab" === e.getAttribute("role") && e.setAttribute("aria-selected", !1);
                }
                (t.classList.add("active"),
                "tab" === t.getAttribute("role") && t.setAttribute("aria-selected", !0),
                v(t),
                t.classList.contains("fade") && t.classList.add("show"),
                t.parentNode && t.parentNode.classList.contains("dropdown-menu")) &&
                    (t.closest(".dropdown") &&
                        q.find(".dropdown-toggle").forEach(function (t) {
                            return t.classList.add("active");
                        }),
                    t.setAttribute("aria-expanded", !0));
                n && n();
            }),
            (n.jQueryInterface = function (t) {
                return this.each(function () {
                    var e = T(this, "bs.tab") || new n(this);
                    if ("string" == typeof t) {
                        if (void 0 === e[t]) throw new TypeError('No method named "' + t + '"');
                        e[t]();
                    }
                });
            }),
            e(n, null, [
                {
                    key: "DATA_KEY",
                    get: function () {
                        return "bs.tab";
                    },
                },
            ]),
            n
        );
    })(R);
    H.on(document, "click.bs.tab.data-api", '[data-bs-toggle="tab"], [data-bs-toggle="pill"], [data-bs-toggle="list"]', function (t) {
        t.preventDefault(), (T(this, "bs.tab") || new $e(this)).show();
    }),
        b(function () {
            var t = _();
            if (t) {
                var e = t.fn.tab;
                (t.fn.tab = $e.jQueryInterface),
                    (t.fn.tab.Constructor = $e),
                    (t.fn.tab.noConflict = function () {
                        return (t.fn.tab = e), $e.jQueryInterface;
                    });
            }
        });
    var Ge = { animation: "boolean", autohide: "boolean", delay: "number" },
        Ze = { animation: !0, autohide: !0, delay: 5e3 },
        Je = (function (t) {
            function o(e, n) {
                var i;
                return ((i = t.call(this, e) || this)._config = i._getConfig(n)), (i._timeout = null), i._setListeners(), i;
            }
            i(o, t);
            var r = o.prototype;
            return (
                (r.show = function () {
                    var t = this;
                    if (!H.trigger(this._element, "show.bs.toast").defaultPrevented) {
                        this._clearTimeout(), this._config.animation && this._element.classList.add("fade");
                        var e = function () {
                            t._element.classList.remove("showing"),
                                t._element.classList.add("show"),
                                H.trigger(t._element, "shown.bs.toast"),
                                t._config.autohide &&
                                    (t._timeout = setTimeout(function () {
                                        t.hide();
                                    }, t._config.delay));
                        };
                        if ((this._element.classList.remove("hide"), v(this._element), this._element.classList.add("showing"), this._config.animation)) {
                            var n = u(this._element);
                            H.one(this._element, "transitionend", e), h(this._element, n);
                        } else e();
                    }
                }),
                (r.hide = function () {
                    var t = this;
                    if (this._element.classList.contains("show") && !H.trigger(this._element, "hide.bs.toast").defaultPrevented) {
                        var e = function () {
                            t._element.classList.add("hide"), H.trigger(t._element, "hidden.bs.toast");
                        };
                        if ((this._element.classList.remove("show"), this._config.animation)) {
                            var n = u(this._element);
                            H.one(this._element, "transitionend", e), h(this._element, n);
                        } else e();
                    }
                }),
                (r.dispose = function () {
                    this._clearTimeout(), this._element.classList.contains("show") && this._element.classList.remove("show"), H.off(this._element, "click.dismiss.bs.toast"), t.prototype.dispose.call(this), (this._config = null);
                }),
                (r._getConfig = function (t) {
                    return (t = n({}, Ze, Y.getDataAttributes(this._element), "object" == typeof t && t ? t : {})), p("toast", t, this.constructor.DefaultType), t;
                }),
                (r._setListeners = function () {
                    var t = this;
                    H.on(this._element, "click.dismiss.bs.toast", '[data-bs-dismiss="toast"]', function () {
                        return t.hide();
                    });
                }),
                (r._clearTimeout = function () {
                    clearTimeout(this._timeout), (this._timeout = null);
                }),
                (o.jQueryInterface = function (t) {
                    return this.each(function () {
                        var e = T(this, "bs.toast");
                        if ((e || (e = new o(this, "object" == typeof t && t)), "string" == typeof t)) {
                            if (void 0 === e[t]) throw new TypeError('No method named "' + t + '"');
                            e[t](this);
                        }
                    });
                }),
                e(o, null, [
                    {
                        key: "DefaultType",
                        get: function () {
                            return Ge;
                        },
                    },
                    {
                        key: "Default",
                        get: function () {
                            return Ze;
                        },
                    },
                    {
                        key: "DATA_KEY",
                        get: function () {
                            return "bs.toast";
                        },
                    },
                ]),
                o
            );
        })(R);
    return (
        b(function () {
            var t = _();
            if (t) {
                var e = t.fn.toast;
                (t.fn.toast = Je.jQueryInterface),
                    (t.fn.toast.Constructor = Je),
                    (t.fn.toast.noConflict = function () {
                        return (t.fn.toast = e), Je.jQueryInterface;
                    });
            }
        }),
        { Alert: K, Button: Q, Carousel: Z, Collapse: nt, Dropdown: Te, Modal: Le, Popover: Ye, ScrollSpy: Xe, Tab: $e, Toast: Je, Tooltip: Re }
    );
});

/* Sweet Alert 2 */
!(function (t, e) {
    "object" == typeof exports && "undefined" != typeof module ? (module.exports = e()) : "function" == typeof define && define.amd ? define(e) : ((t = t || self).Sweetalert2 = e());
})(this, function () {
    "use strict";
    function r(t) {
        return (r =
            "function" == typeof Symbol && "symbol" == typeof Symbol.iterator
                ? function (t) {
                      return typeof t;
                  }
                : function (t) {
                      return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : typeof t;
                  })(t);
    }
    function a(t, e) {
        if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function");
    }
    function o(t, e) {
        for (var n = 0; n < e.length; n++) {
            var o = e[n];
            (o.enumerable = o.enumerable || !1), (o.configurable = !0), "value" in o && (o.writable = !0), Object.defineProperty(t, o.key, o);
        }
    }
    function c(t, e, n) {
        return e && o(t.prototype, e), n && o(t, n), t;
    }
    function s() {
        return (s =
            Object.assign ||
            function (t) {
                for (var e = 1; e < arguments.length; e++) {
                    var n,
                        o = arguments[e];
                    for (n in o) Object.prototype.hasOwnProperty.call(o, n) && (t[n] = o[n]);
                }
                return t;
            }).apply(this, arguments);
    }
    function u(t) {
        return (u = Object.setPrototypeOf
            ? Object.getPrototypeOf
            : function (t) {
                  return t.__proto__ || Object.getPrototypeOf(t);
              })(t);
    }
    function l(t, e) {
        return (l =
            Object.setPrototypeOf ||
            function (t, e) {
                return (t.__proto__ = e), t;
            })(t, e);
    }
    function d() {
        if ("undefined" == typeof Reflect || !Reflect.construct) return !1;
        if (Reflect.construct.sham) return !1;
        if ("function" == typeof Proxy) return !0;
        try {
            return Date.prototype.toString.call(Reflect.construct(Date, [], function () {})), !0;
        } catch (t) {
            return !1;
        }
    }
    function i(t, e, n) {
        return (i = d()
            ? Reflect.construct
            : function (t, e, n) {
                  var o = [null];
                  o.push.apply(o, e);
                  o = new (Function.bind.apply(t, o))();
                  return n && l(o, n.prototype), o;
              }).apply(null, arguments);
    }
    function p(t, e) {
        return !e || ("object" != typeof e && "function" != typeof e)
            ? (function (t) {
                  if (void 0 === t) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                  return t;
              })(t)
            : e;
    }
    function f(t, e, n) {
        return (f =
            "undefined" != typeof Reflect && Reflect.get
                ? Reflect.get
                : function (t, e, n) {
                      t = (function (t, e) {
                          for (; !Object.prototype.hasOwnProperty.call(t, e) && null !== (t = u(t)); );
                          return t;
                      })(t, e);
                      if (t) {
                          e = Object.getOwnPropertyDescriptor(t, e);
                          return e.get ? e.get.call(n) : e.value;
                      }
                  })(t, e, n || t);
    }
    function m(t) {
        return t.charAt(0).toUpperCase() + t.slice(1);
    }
    function h(e) {
        return Object.keys(e).map(function (t) {
            return e[t];
        });
    }
    function g(t) {
        return Array.prototype.slice.call(t);
    }
    function v(t, e) {
        (e = '"'.concat(t, '" is deprecated and will be removed in the next major release. Please use "').concat(e, '" instead.')), -1 === Y.indexOf(e) && (Y.push(e), W(e));
    }
    function b(t) {
        return t && "function" == typeof t.toPromise;
    }
    function y(t) {
        return b(t) ? t.toPromise() : Promise.resolve(t);
    }
    function w(t) {
        return t && Promise.resolve(t) === t;
    }
    function C(t) {
        return t instanceof Element || ("object" === r((t = t)) && t.jquery);
    }
    function k() {
        return document.body.querySelector(".".concat($.container));
    }
    function A(t) {
        var e = k();
        return e ? e.querySelector(t) : null;
    }
    function t(t) {
        return A(".".concat(t));
    }
    function x() {
        return t($.popup);
    }
    function n() {
        var t = x();
        return g(t.querySelectorAll(".".concat($.icon)));
    }
    function B() {
        var t = n().filter(function (t) {
            return wt(t);
        });
        return t.length ? t[0] : null;
    }
    function P() {
        return t($.title);
    }
    function E() {
        return t($.content);
    }
    function O() {
        return t($.image);
    }
    function S() {
        return t($["progress-steps"]);
    }
    function T() {
        return t($["validation-message"]);
    }
    function L() {
        return A(".".concat($.actions, " .").concat($.confirm));
    }
    function q() {
        return A(".".concat($.actions, " .").concat($.deny));
    }
    function D() {
        return A(".".concat($.loader));
    }
    function j() {
        return A(".".concat($.actions, " .").concat($.cancel));
    }
    function I() {
        return t($.actions);
    }
    function M() {
        return t($.header);
    }
    function H() {
        return t($.footer);
    }
    function V() {
        return t($["timer-progress-bar"]);
    }
    function R() {
        return t($.close);
    }
    function N() {
        var t = g(x().querySelectorAll('[tabindex]:not([tabindex="-1"]):not([tabindex="0"])')).sort(function (t, e) {
                return (t = parseInt(t.getAttribute("tabindex"))), (e = parseInt(e.getAttribute("tabindex"))) < t ? 1 : t < e ? -1 : 0;
            }),
            e = g(
                x().querySelectorAll(
                    '\n  a[href],\n  area[href],\n  input:not([disabled]),\n  select:not([disabled]),\n  textarea:not([disabled]),\n  button:not([disabled]),\n  iframe,\n  object,\n  embed,\n  [tabindex="0"],\n  [contenteditable],\n  audio[controls],\n  video[controls],\n  summary\n'
                )
            ).filter(function (t) {
                return "-1" !== t.getAttribute("tabindex");
            });
        return (function (t) {
            for (var e = [], n = 0; n < t.length; n++) -1 === e.indexOf(t[n]) && e.push(t[n]);
            return e;
        })(t.concat(e)).filter(function (t) {
            return wt(t);
        });
    }
    function U() {
        return !G() && !document.body.classList.contains($["no-backdrop"]);
    }
    function _(e, t) {
        (e.textContent = ""),
            t &&
                ((t = new DOMParser().parseFromString(t, "text/html")),
                g(t.querySelector("head").childNodes).forEach(function (t) {
                    e.appendChild(t);
                }),
                g(t.querySelector("body").childNodes).forEach(function (t) {
                    e.appendChild(t);
                }));
    }
    function F(t, e) {
        if (e) {
            for (var n = e.split(/\s+/), o = 0; o < n.length; o++) if (!t.classList.contains(n[o])) return;
            return 1;
        }
    }
    function z(t, e, n) {
        var o, i;
        if (
            ((i = e),
            g((o = t).classList).forEach(function (t) {
                -1 === h($).indexOf(t) && -1 === h(X).indexOf(t) && -1 === h(i.showClass).indexOf(t) && o.classList.remove(t);
            }),
            e.customClass && e.customClass[n])
        ) {
            if ("string" != typeof e.customClass[n] && !e.customClass[n].forEach) return W("Invalid type of customClass.".concat(n, '! Expected string or iterable object, got "').concat(r(e.customClass[n]), '"'));
            vt(t, e.customClass[n]);
        }
    }
    var e = "SweetAlert2:",
        W = function (t) {
            console.warn("".concat(e, " ").concat("object" === r(t) ? t.join(" ") : t));
        },
        K = function (t) {
            console.error("".concat(e, " ").concat(t));
        },
        Y = [],
        Z = function (t) {
            return "function" == typeof t ? t() : t;
        },
        Q = Object.freeze({ cancel: "cancel", backdrop: "backdrop", close: "close", esc: "esc", timer: "timer" }),
        J = function (t) {
            var e,
                n = {};
            for (e in t) n[t[e]] = "swal2-" + t[e];
            return n;
        },
        $ = J([
            "container",
            "shown",
            "height-auto",
            "iosfix",
            "popup",
            "modal",
            "no-backdrop",
            "no-transition",
            "toast",
            "toast-shown",
            "toast-column",
            "show",
            "hide",
            "close",
            "title",
            "header",
            "content",
            "html-container",
            "actions",
            "confirm",
            "deny",
            "cancel",
            "footer",
            "icon",
            "icon-content",
            "image",
            "input",
            "file",
            "range",
            "select",
            "radio",
            "checkbox",
            "label",
            "textarea",
            "inputerror",
            "input-label",
            "validation-message",
            "progress-steps",
            "active-progress-step",
            "progress-step",
            "progress-step-line",
            "loader",
            "loading",
            "styled",
            "top",
            "top-start",
            "top-end",
            "top-left",
            "top-right",
            "center",
            "center-start",
            "center-end",
            "center-left",
            "center-right",
            "bottom",
            "bottom-start",
            "bottom-end",
            "bottom-left",
            "bottom-right",
            "grow-row",
            "grow-column",
            "grow-fullscreen",
            "rtl",
            "timer-progress-bar",
            "timer-progress-bar-container",
            "scrollbar-measure",
            "icon-success",
            "icon-warning",
            "icon-info",
            "icon-question",
            "icon-error",
        ]),
        X = J(["success", "warning", "info", "question", "error"]),
        G = function () {
            return document.body.classList.contains($["toast-shown"]);
        },
        tt = { previousBodyPadding: null };
    function et(t, e) {
        if (!e) return null;
        switch (e) {
            case "select":
            case "textarea":
            case "file":
                return yt(t, $[e]);
            case "checkbox":
                return t.querySelector(".".concat($.checkbox, " input"));
            case "radio":
                return t.querySelector(".".concat($.radio, " input:checked")) || t.querySelector(".".concat($.radio, " input:first-child"));
            case "range":
                return t.querySelector(".".concat($.range, " input"));
            default:
                return yt(t, $.input);
        }
    }
    function nt(t) {
        var e;
        t.focus(), "file" !== t.type && ((e = t.value), (t.value = ""), (t.value = e));
    }
    function ot(t, e, n) {
        t &&
            e &&
            ("string" == typeof e && (e = e.split(/\s+/).filter(Boolean)),
            e.forEach(function (e) {
                t.forEach
                    ? t.forEach(function (t) {
                          n ? t.classList.add(e) : t.classList.remove(e);
                      })
                    : n
                    ? t.classList.add(e)
                    : t.classList.remove(e);
            }));
    }
    function it(t, e, n) {
        n === "".concat(parseInt(n)) && (n = parseInt(n)), n || 0 === parseInt(n) ? (t.style[e] = "number" == typeof n ? "".concat(n, "px") : n) : t.style.removeProperty(e);
    }
    function rt(t) {
        var e = 1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : "flex";
        t.style.display = e;
    }
    function at(t) {
        t.style.display = "none";
    }
    function ct(t, e, n, o) {
        (e = t.querySelector(e)) && (e.style[n] = o);
    }
    function st(t, e, n) {
        e ? rt(t, n) : at(t);
    }
    function ut(t) {
        return !!(t.scrollHeight > t.clientHeight);
    }
    function lt(t) {
        var e = window.getComputedStyle(t),
            t = parseFloat(e.getPropertyValue("animation-duration") || "0"),
            e = parseFloat(e.getPropertyValue("transition-duration") || "0");
        return 0 < t || 0 < e;
    }
    function dt(t) {
        var e = 1 < arguments.length && void 0 !== arguments[1] && arguments[1],
            n = V();
        wt(n) &&
            (e && ((n.style.transition = "none"), (n.style.width = "100%")),
            setTimeout(function () {
                (n.style.transition = "width ".concat(t / 1e3, "s linear")), (n.style.width = "0%");
            }, 10));
    }
    function pt() {
        return "undefined" == typeof window || "undefined" == typeof document;
    }
    function ft(t) {
        Mn.isVisible() && gt !== t.target.value && Mn.resetValidationMessage(), (gt = t.target.value);
    }
    function mt(t, e) {
        t instanceof HTMLElement ? e.appendChild(t) : "object" === r(t) ? At(t, e) : t && _(e, t);
    }
    function ht(t, e) {
        var n,
            o,
            i,
            r,
            a = I(),
            c = D(),
            s = L(),
            u = q(),
            l = j();
        e.showConfirmButton || e.showDenyButton || e.showCancelButton || at(a),
            z(a, e, "actions"),
            Pt(s, "confirm", e),
            Pt(u, "deny", e),
            Pt(l, "cancel", e),
            (n = s),
            (o = u),
            (i = l),
            (r = e).buttonsStyling
                ? (vt([n, o, i], $.styled),
                  r.confirmButtonColor && (n.style.backgroundColor = r.confirmButtonColor),
                  r.denyButtonColor && (o.style.backgroundColor = r.denyButtonColor),
                  r.cancelButtonColor && (i.style.backgroundColor = r.cancelButtonColor))
                : bt([n, o, i], $.styled),
            e.reverseButtons && (a.insertBefore(l, c), a.insertBefore(u, c), a.insertBefore(s, c)),
            _(c, e.loaderHtml),
            z(c, e, "loader");
    }
    var gt,
        vt = function (t, e) {
            ot(t, e, !0);
        },
        bt = function (t, e) {
            ot(t, e, !1);
        },
        yt = function (t, e) {
            for (var n = 0; n < t.childNodes.length; n++) if (F(t.childNodes[n], e)) return t.childNodes[n];
        },
        wt = function (t) {
            return !(!t || !(t.offsetWidth || t.offsetHeight || t.getClientRects().length));
        },
        Ct = '\n <div aria-labelledby="'
            .concat($.title, '" aria-describedby="')
            .concat($.content, '" class="')
            .concat($.popup, '" tabindex="-1">\n   <div class="')
            .concat($.header, '">\n     <ul class="')
            .concat($["progress-steps"], '"></ul>\n     <div class="')
            .concat($.icon, " ")
            .concat(X.error, '"></div>\n     <div class="')
            .concat($.icon, " ")
            .concat(X.question, '"></div>\n     <div class="')
            .concat($.icon, " ")
            .concat(X.warning, '"></div>\n     <div class="')
            .concat($.icon, " ")
            .concat(X.info, '"></div>\n     <div class="')
            .concat($.icon, " ")
            .concat(X.success, '"></div>\n     <img class="')
            .concat($.image, '" />\n     <h2 class="')
            .concat($.title, '" id="')
            .concat($.title, '"></h2>\n     <button type="button" class="')
            .concat($.close, '"></button>\n   </div>\n   <div class="')
            .concat($.content, '">\n     <div id="')
            .concat($.content, '" class="')
            .concat($["html-container"], '"></div>\n     <input class="')
            .concat($.input, '" />\n     <input type="file" class="')
            .concat($.file, '" />\n     <div class="')
            .concat($.range, '">\n       <input type="range" />\n       <output></output>\n     </div>\n     <select class="')
            .concat($.select, '"></select>\n     <div class="')
            .concat($.radio, '"></div>\n     <label for="')
            .concat($.checkbox, '" class="')
            .concat($.checkbox, '">\n       <input type="checkbox" />\n       <span class="')
            .concat($.label, '"></span>\n     </label>\n     <textarea class="')
            .concat($.textarea, '"></textarea>\n     <div class="')
            .concat($["validation-message"], '" id="')
            .concat($["validation-message"], '"></div>\n   </div>\n   <div class="')
            .concat($.actions, '">\n     <div class="')
            .concat($.loader, '"></div>\n     <button type="button" class="')
            .concat($.confirm, '"></button>\n     <button type="button" class="')
            .concat($.deny, '"></button>\n     <button type="button" class="')
            .concat($.cancel, '"></button>\n   </div>\n   <div class="')
            .concat($.footer, '"></div>\n   <div class="')
            .concat($["timer-progress-bar-container"], '">\n     <div class="')
            .concat($["timer-progress-bar"], '"></div>\n   </div>\n </div>\n')
            .replace(/(^|\n)\s*/g, ""),
        kt = function (t) {
            var e,
                n,
                o,
                i,
                r,
                a = !!(i = k()) && (i.parentNode.removeChild(i), bt([document.documentElement, document.body], [$["no-backdrop"], $["toast-shown"], $["has-column"]]), !0);
            pt()
                ? K("SweetAlert2 requires document to initialize")
                : (((r = document.createElement("div")).className = $.container),
                  a && vt(r, $["no-transition"]),
                  _(r, Ct),
                  (i = "string" == typeof (e = t.target) ? document.querySelector(e) : e).appendChild(r),
                  (a = t),
                  (e = x()).setAttribute("role", a.toast ? "alert" : "dialog"),
                  e.setAttribute("aria-live", a.toast ? "polite" : "assertive"),
                  a.toast || e.setAttribute("aria-modal", "true"),
                  (r = i),
                  "rtl" === window.getComputedStyle(r).direction && vt(k(), $.rtl),
                  (t = E()),
                  (a = yt(t, $.input)),
                  (e = yt(t, $.file)),
                  (n = t.querySelector(".".concat($.range, " input"))),
                  (o = t.querySelector(".".concat($.range, " output"))),
                  (i = yt(t, $.select)),
                  (r = t.querySelector(".".concat($.checkbox, " input"))),
                  (t = yt(t, $.textarea)),
                  (a.oninput = ft),
                  (e.onchange = ft),
                  (i.onchange = ft),
                  (r.onchange = ft),
                  (t.oninput = ft),
                  (n.oninput = function (t) {
                      ft(t), (o.value = n.value);
                  }),
                  (n.onchange = function (t) {
                      ft(t), (n.nextSibling.value = n.value);
                  }));
        },
        At = function (t, e) {
            t.jquery ? xt(e, t) : _(e, t.toString());
        },
        xt = function (t, e) {
            if (((t.textContent = ""), 0 in e)) for (var n = 0; n in e; n++) t.appendChild(e[n].cloneNode(!0));
            else t.appendChild(e.cloneNode(!0));
        },
        Bt = (function () {
            if (pt()) return !1;
            var t,
                e = document.createElement("div"),
                n = { WebkitAnimation: "webkitAnimationEnd", OAnimation: "oAnimationEnd oanimationend", animation: "animationend" };
            for (t in n) if (Object.prototype.hasOwnProperty.call(n, t) && void 0 !== e.style[t]) return n[t];
            return !1;
        })();
    function Pt(t, e, n) {
        st(t, n["show".concat(m(e), "Button")], "inline-block"),
            _(t, n["".concat(e, "ButtonText")]),
            t.setAttribute("aria-label", n["".concat(e, "ButtonAriaLabel")]),
            (t.className = $[e]),
            z(t, n, "".concat(e, "Button")),
            vt(t, n["".concat(e, "ButtonClass")]);
    }
    function Et(t, e) {
        var n,
            o,
            i = k();
        i &&
            ((o = i),
            "string" == typeof (n = e.backdrop) ? (o.style.background = n) : n || vt([document.documentElement, document.body], $["no-backdrop"]),
            !e.backdrop && e.allowOutsideClick && W('"allowOutsideClick" parameter requires `backdrop` parameter to be set to `true`'),
            (o = i),
            (n = e.position) in $ ? vt(o, $[n]) : (W('The "position" parameter is not valid, defaulting to "center"'), vt(o, $.center)),
            (n = i),
            !(o = e.grow) || "string" != typeof o || ((o = "grow-".concat(o)) in $ && vt(n, $[o])),
            z(i, e, "container"),
            (e = document.body.getAttribute("data-swal2-queue-step")) && (i.setAttribute("data-queue-step", e), document.body.removeAttribute("data-swal2-queue-step")));
    }
    function Ot(t, e) {
        (t.placeholder && !e.inputPlaceholder) || (t.placeholder = e.inputPlaceholder);
    }
    function St(t, e, n) {
        var o, i;
        n.inputLabel &&
            ((t.id = $.input),
            (o = document.createElement("label")),
            (i = $["input-label"]),
            o.setAttribute("for", t.id),
            (o.className = i),
            vt(o, n.customClass.inputLabel),
            (o.innerText = n.inputLabel),
            e.insertAdjacentElement("beforebegin", o));
    }
    var Tt = { promise: new WeakMap(), innerParams: new WeakMap(), domCache: new WeakMap() },
        Lt = ["input", "file", "range", "select", "radio", "checkbox", "textarea"],
        qt = function (t) {
            if (!Mt[t.input]) return K('Unexpected type of input! Expected "text", "email", "password", "number", "tel", "select", "radio", "checkbox", "textarea", "file" or "url", got "'.concat(t.input, '"'));
            var e = It(t.input),
                n = Mt[t.input](e, t);
            rt(n),
                setTimeout(function () {
                    nt(n);
                });
        },
        Dt = function (t, e) {
            var n = et(E(), t);
            if (n)
                for (var o in (!(function (t) {
                    for (var e = 0; e < t.attributes.length; e++) {
                        var n = t.attributes[e].name;
                        -1 === ["type", "value", "style"].indexOf(n) && t.removeAttribute(n);
                    }
                })(n),
                e))
                    ("range" === t && "placeholder" === o) || n.setAttribute(o, e[o]);
        },
        jt = function (t) {
            var e = It(t.input);
            t.customClass && vt(e, t.customClass.input);
        },
        It = function (t) {
            t = $[t] || $.input;
            return yt(E(), t);
        },
        Mt = {};
    (Mt.text = Mt.email = Mt.password = Mt.number = Mt.tel = Mt.url = function (t, e) {
        return (
            "string" == typeof e.inputValue || "number" == typeof e.inputValue ? (t.value = e.inputValue) : w(e.inputValue) || W('Unexpected type of inputValue! Expected "string", "number" or "Promise", got "'.concat(r(e.inputValue), '"')),
            St(t, t, e),
            Ot(t, e),
            (t.type = e.input),
            t
        );
    }),
        (Mt.file = function (t, e) {
            return St(t, t, e), Ot(t, e), t;
        }),
        (Mt.range = function (t, e) {
            var n = t.querySelector("input"),
                o = t.querySelector("output");
            return (n.value = e.inputValue), (n.type = e.input), (o.value = e.inputValue), St(n, t, e), t;
        }),
        (Mt.select = function (t, e) {
            var n;
            return (t.textContent = ""), e.inputPlaceholder && ((n = document.createElement("option")), _(n, e.inputPlaceholder), (n.value = ""), (n.disabled = !0), (n.selected = !0), t.appendChild(n)), St(t, t, e), t;
        }),
        (Mt.radio = function (t) {
            return (t.textContent = ""), t;
        }),
        (Mt.checkbox = function (t, e) {
            var n = et(E(), "checkbox");
            (n.value = 1), (n.id = $.checkbox), (n.checked = Boolean(e.inputValue));
            n = t.querySelector("span");
            return _(n, e.inputPlaceholder), t;
        }),
        (Mt.textarea = function (e, t) {
            (e.value = t.inputValue), Ot(e, t), St(e, e, t);
            function n(t) {
                return parseInt(window.getComputedStyle(t).paddingLeft) + parseInt(window.getComputedStyle(t).paddingRight);
            }
            var o;
            return (
                "MutationObserver" in window &&
                    ((o = parseInt(window.getComputedStyle(x()).width)),
                    new MutationObserver(function () {
                        var t = e.offsetWidth + n(x()) + n(E());
                        x().style.width = o < t ? "".concat(t, "px") : null;
                    }).observe(e, { attributes: !0, attributeFilter: ["style"] })),
                e
            );
        });
    function Ht(t, e) {
        var o,
            i,
            r,
            n = E().querySelector("#".concat($.content));
        e.html ? (mt(e.html, n), rt(n, "block")) : e.text ? ((n.textContent = e.text), rt(n, "block")) : at(n),
            (t = t),
            (o = e),
            (i = E()),
            (t = Tt.innerParams.get(t)),
            (r = !t || o.input !== t.input),
            Lt.forEach(function (t) {
                var e = $[t],
                    n = yt(i, e);
                Dt(t, o.inputAttributes), (n.className = e), r && at(n);
            }),
            o.input && (r && qt(o), jt(o)),
            z(E(), e, "content");
    }
    function Vt() {
        return k() && k().getAttribute("data-queue-step");
    }
    function Rt(t, o) {
        var i = S();
        if (!o.progressSteps || 0 === o.progressSteps.length) return at(i), 0;
        rt(i), (i.textContent = "");
        var r = parseInt(void 0 === o.currentProgressStep ? Vt() : o.currentProgressStep);
        r >= o.progressSteps.length && W("Invalid currentProgressStep parameter, it should be less than progressSteps.length (currentProgressStep like JS arrays starts from 0)"),
            o.progressSteps.forEach(function (t, e) {
                var n,
                    t = ((n = t), (t = document.createElement("li")), vt(t, $["progress-step"]), _(t, n), t);
                i.appendChild(t),
                    e === r && vt(t, $["active-progress-step"]),
                    e !== o.progressSteps.length - 1 && ((t = o), (e = document.createElement("li")), vt(e, $["progress-step-line"]), t.progressStepsDistance && (e.style.width = t.progressStepsDistance), (e = e), i.appendChild(e));
            });
    }
    function Nt(t, e) {
        var n = M();
        z(n, e, "header"),
            Rt(0, e),
            (n = t),
            (t = e),
            (n = Tt.innerParams.get(n)) && t.icon === n.icon && B()
                ? zt(B(), t)
                : (Ft(),
                  t.icon &&
                      (-1 !== Object.keys(X).indexOf(t.icon)
                          ? ((n = A(".".concat($.icon, ".").concat(X[t.icon]))), rt(n), Kt(n, t), zt(n, t), vt(n, t.showClass.icon))
                          : K('Unknown icon! Expected "success", "error", "warning", "info" or "question", got "'.concat(t.icon, '"')))),
            (function (t) {
                var e = O();
                if (!t.imageUrl) return at(e);
                rt(e, ""), e.setAttribute("src", t.imageUrl), e.setAttribute("alt", t.imageAlt), it(e, "width", t.imageWidth), it(e, "height", t.imageHeight), (e.className = $.image), z(e, t, "image");
            })(e),
            (n = e),
            (t = P()),
            st(t, n.title || n.titleText),
            n.title && mt(n.title, t),
            n.titleText && (t.innerText = n.titleText),
            z(t, n, "title"),
            (n = e),
            (e = R()),
            _(e, n.closeButtonHtml),
            z(e, n, "closeButton"),
            st(e, n.showCloseButton),
            e.setAttribute("aria-label", n.closeButtonAriaLabel);
    }
    function Ut(t, e) {
        var n, o;
        (o = e),
            (n = x()),
            it(n, "width", o.width),
            it(n, "padding", o.padding),
            o.background && (n.style.background = o.background),
            Jt(n, o),
            Et(0, e),
            Nt(t, e),
            Ht(t, e),
            ht(0, e),
            (o = e),
            (t = H()),
            st(t, o.footer),
            o.footer && mt(o.footer, t),
            z(t, o, "footer"),
            "function" == typeof e.didRender ? e.didRender(x()) : "function" == typeof e.onRender && e.onRender(x());
    }
    function _t() {
        return L() && L().click();
    }
    var Ft = function () {
            for (var t = n(), e = 0; e < t.length; e++) at(t[e]);
        },
        zt = function (t, e) {
            Yt(t, e), Wt(), z(t, e, "icon");
        },
        Wt = function () {
            for (var t = x(), e = window.getComputedStyle(t).getPropertyValue("background-color"), n = t.querySelectorAll("[class^=swal2-success-circular-line], .swal2-success-fix"), o = 0; o < n.length; o++) n[o].style.backgroundColor = e;
        },
        Kt = function (t, e) {
            (t.textContent = ""),
                e.iconHtml
                    ? _(t, Zt(e.iconHtml))
                    : "success" === e.icon
                    ? _(
                          t,
                          '\n      <div class="swal2-success-circular-line-left"></div>\n      <span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span>\n      <div class="swal2-success-ring"></div> <div class="swal2-success-fix"></div>\n      <div class="swal2-success-circular-line-right"></div>\n    '
                      )
                    : "error" === e.icon
                    ? _(t, '\n      <span class="swal2-x-mark">\n        <span class="swal2-x-mark-line-left"></span>\n        <span class="swal2-x-mark-line-right"></span>\n      </span>\n    ')
                    : _(t, Zt({ question: "?", warning: "!", info: "i" }[e.icon]));
        },
        Yt = function (t, e) {
            if (e.iconColor) {
                (t.style.color = e.iconColor), (t.style.borderColor = e.iconColor);
                for (var n = 0, o = [".swal2-success-line-tip", ".swal2-success-line-long", ".swal2-x-mark-line-left", ".swal2-x-mark-line-right"]; n < o.length; n++) ct(t, o[n], "backgroundColor", e.iconColor);
                ct(t, ".swal2-success-ring", "borderColor", e.iconColor);
            }
        },
        Zt = function (t) {
            return '<div class="'.concat($["icon-content"], '">').concat(t, "</div>");
        },
        Qt = [],
        Jt = function (t, e) {
            (t.className = "".concat($.popup, " ").concat(wt(t) ? e.showClass.popup : "")),
                e.toast ? (vt([document.documentElement, document.body], $["toast-shown"]), vt(t, $.toast)) : vt(t, $.modal),
                z(t, e, "popup"),
                "string" == typeof e.customClass && vt(t, e.customClass),
                e.icon && vt(t, $["icon-".concat(e.icon)]);
        };
    function $t(t) {
        var e = x();
        e || Mn.fire(), (e = x());
        var n = I(),
            o = D();
        !t && wt(L()) && (t = L()),
            rt(n),
            t && (at(t), o.setAttribute("data-button-to-replace", t.className)),
            o.parentNode.insertBefore(o, t),
            vt([e, n], $.loading),
            rt(o),
            e.setAttribute("data-loading", !0),
            e.setAttribute("aria-busy", !0),
            e.focus();
    }
    function Xt() {
        return new Promise(function (t) {
            var e = window.scrollX,
                n = window.scrollY;
            (ee.restoreFocusTimeout = setTimeout(function () {
                ee.previousActiveElement && ee.previousActiveElement.focus ? (ee.previousActiveElement.focus(), (ee.previousActiveElement = null)) : document.body && document.body.focus(), t();
            }, 100)),
                void 0 !== e && void 0 !== n && window.scrollTo(e, n);
        });
    }
    function Gt() {
        if (ee.timeout)
            return (
                (function () {
                    var t = V(),
                        e = parseInt(window.getComputedStyle(t).width);
                    t.style.removeProperty("transition"), (t.style.width = "100%");
                    var n = parseInt(window.getComputedStyle(t).width),
                        n = parseInt((e / n) * 100);
                    t.style.removeProperty("transition"), (t.style.width = "".concat(n, "%"));
                })(),
                ee.timeout.stop()
            );
    }
    function te() {
        if (ee.timeout) {
            var t = ee.timeout.start();
            return dt(t), t;
        }
    }
    var ee = {},
        ne = !1,
        oe = {};
    function ie(t) {
        for (var e = t.target; e && e !== document; e = e.parentNode)
            for (var n in oe) {
                var o = e.getAttribute(n);
                if (o) return void oe[n].fire({ template: o });
            }
    }
    function re(t) {
        return Object.prototype.hasOwnProperty.call(se, t);
    }
    function ae(t) {
        return le[t];
    }
    function ce(t) {
        for (var e in t) re((o = e)) || W('Unknown parameter "'.concat(o, '"')), t.toast && ((n = e), -1 !== de.indexOf(n) && W('The parameter "'.concat(n, '" is incompatible with toasts'))), ae((n = e)) && v(n, ae(n));
        var n, o;
    }
    var se = {
            title: "",
            titleText: "",
            text: "",
            html: "",
            footer: "",
            icon: void 0,
            iconColor: void 0,
            iconHtml: void 0,
            template: void 0,
            toast: !1,
            animation: !0,
            showClass: { popup: "swal2-show", backdrop: "swal2-backdrop-show", icon: "swal2-icon-show" },
            hideClass: { popup: "swal2-hide", backdrop: "swal2-backdrop-hide", icon: "swal2-icon-hide" },
            customClass: {},
            target: "body",
            backdrop: !0,
            heightAuto: !0,
            allowOutsideClick: !0,
            allowEscapeKey: !0,
            allowEnterKey: !0,
            stopKeydownPropagation: !0,
            keydownListenerCapture: !1,
            showConfirmButton: !0,
            showDenyButton: !1,
            showCancelButton: !1,
            preConfirm: void 0,
            preDeny: void 0,
            confirmButtonText: "OK",
            confirmButtonAriaLabel: "",
            confirmButtonColor: void 0,
            denyButtonText: "No",
            denyButtonAriaLabel: "",
            denyButtonColor: void 0,
            cancelButtonText: "Cancel",
            cancelButtonAriaLabel: "",
            cancelButtonColor: void 0,
            buttonsStyling: !0,
            reverseButtons: !1,
            focusConfirm: !0,
            focusDeny: !1,
            focusCancel: !1,
            showCloseButton: !1,
            closeButtonHtml: "&times;",
            closeButtonAriaLabel: "Close this dialog",
            loaderHtml: "",
            showLoaderOnConfirm: !1,
            showLoaderOnDeny: !1,
            imageUrl: void 0,
            imageWidth: void 0,
            imageHeight: void 0,
            imageAlt: "",
            timer: void 0,
            timerProgressBar: !1,
            width: void 0,
            padding: void 0,
            background: void 0,
            input: void 0,
            inputPlaceholder: "",
            inputLabel: "",
            inputValue: "",
            inputOptions: {},
            inputAutoTrim: !0,
            inputAttributes: {},
            inputValidator: void 0,
            returnInputValueOnDeny: !1,
            validationMessage: void 0,
            grow: !1,
            position: "center",
            progressSteps: [],
            currentProgressStep: void 0,
            progressStepsDistance: void 0,
            onBeforeOpen: void 0,
            onOpen: void 0,
            willOpen: void 0,
            didOpen: void 0,
            onRender: void 0,
            didRender: void 0,
            onClose: void 0,
            onAfterClose: void 0,
            willClose: void 0,
            didClose: void 0,
            onDestroy: void 0,
            didDestroy: void 0,
            scrollbarPadding: !0,
        },
        ue = [
            "allowEscapeKey",
            "allowOutsideClick",
            "background",
            "buttonsStyling",
            "cancelButtonAriaLabel",
            "cancelButtonColor",
            "cancelButtonText",
            "closeButtonAriaLabel",
            "closeButtonHtml",
            "confirmButtonAriaLabel",
            "confirmButtonColor",
            "confirmButtonText",
            "currentProgressStep",
            "customClass",
            "denyButtonAriaLabel",
            "denyButtonColor",
            "denyButtonText",
            "didClose",
            "didDestroy",
            "footer",
            "hideClass",
            "html",
            "icon",
            "iconColor",
            "imageAlt",
            "imageHeight",
            "imageUrl",
            "imageWidth",
            "onAfterClose",
            "onClose",
            "onDestroy",
            "progressSteps",
            "reverseButtons",
            "showCancelButton",
            "showCloseButton",
            "showConfirmButton",
            "showDenyButton",
            "text",
            "title",
            "titleText",
            "willClose",
        ],
        le = { animation: 'showClass" and "hideClass', onBeforeOpen: "willOpen", onOpen: "didOpen", onRender: "didRender", onClose: "willClose", onAfterClose: "didClose", onDestroy: "didDestroy" },
        de = ["allowOutsideClick", "allowEnterKey", "backdrop", "focusConfirm", "focusDeny", "focusCancel", "heightAuto", "keydownListenerCapture"],
        pe = Object.freeze({
            isValidParameter: re,
            isUpdatableParameter: function (t) {
                return -1 !== ue.indexOf(t);
            },
            isDeprecatedParameter: ae,
            argsToParams: function (n) {
                var o = {};
                return (
                    "object" !== r(n[0]) || C(n[0])
                        ? ["title", "html", "icon"].forEach(function (t, e) {
                              e = n[e];
                              "string" == typeof e || C(e) ? (o[t] = e) : void 0 !== e && K("Unexpected type of ".concat(t, '! Expected "string" or "Element", got ').concat(r(e)));
                          })
                        : s(o, n[0]),
                    o
                );
            },
            isVisible: function () {
                return wt(x());
            },
            clickConfirm: _t,
            clickDeny: function () {
                return q() && q().click();
            },
            clickCancel: function () {
                return j() && j().click();
            },
            getContainer: k,
            getPopup: x,
            getTitle: P,
            getContent: E,
            getHtmlContainer: function () {
                return t($["html-container"]);
            },
            getImage: O,
            getIcon: B,
            getIcons: n,
            getInputLabel: function () {
                return t($["input-label"]);
            },
            getCloseButton: R,
            getActions: I,
            getConfirmButton: L,
            getDenyButton: q,
            getCancelButton: j,
            getLoader: D,
            getHeader: M,
            getFooter: H,
            getTimerProgressBar: V,
            getFocusableElements: N,
            getValidationMessage: T,
            isLoading: function () {
                return x().hasAttribute("data-loading");
            },
            fire: function () {
                for (var t = arguments.length, e = new Array(t), n = 0; n < t; n++) e[n] = arguments[n];
                return i(this, e);
            },
            mixin: function (r) {
                return (function (t) {
                    !(function (t, e) {
                        if ("function" != typeof e && null !== e) throw new TypeError("Super expression must either be null or a function");
                        (t.prototype = Object.create(e && e.prototype, { constructor: { value: t, writable: !0, configurable: !0 } })), e && l(t, e);
                    })(i, t);
                    var n,
                        o,
                        e =
                            ((n = i),
                            (o = d()),
                            function () {
                                var t,
                                    e = u(n);
                                return p(this, o ? ((t = u(this).constructor), Reflect.construct(e, arguments, t)) : e.apply(this, arguments));
                            });
                    function i() {
                        return a(this, i), e.apply(this, arguments);
                    }
                    return (
                        c(i, [
                            {
                                key: "_main",
                                value: function (t, e) {
                                    return f(u(i.prototype), "_main", this).call(this, t, s({}, e, r));
                                },
                            },
                        ]),
                        i
                    );
                })(this);
            },
            queue: function (t) {
                var r = this;
                Qt = t;
                function a(t, e) {
                    (Qt = []), t(e);
                }
                var c = [];
                return new Promise(function (i) {
                    !(function e(n, o) {
                        n < Qt.length
                            ? (document.body.setAttribute("data-swal2-queue-step", n),
                              r.fire(Qt[n]).then(function (t) {
                                  void 0 !== t.value ? (c.push(t.value), e(n + 1, o)) : a(i, { dismiss: t.dismiss });
                              }))
                            : a(i, { value: c });
                    })(0);
                });
            },
            getQueueStep: Vt,
            insertQueueStep: function (t, e) {
                return e && e < Qt.length ? Qt.splice(e, 0, t) : Qt.push(t);
            },
            deleteQueueStep: function (t) {
                void 0 !== Qt[t] && Qt.splice(t, 1);
            },
            showLoading: $t,
            enableLoading: $t,
            getTimerLeft: function () {
                return ee.timeout && ee.timeout.getTimerLeft();
            },
            stopTimer: Gt,
            resumeTimer: te,
            toggleTimer: function () {
                var t = ee.timeout;
                return t && (t.running ? Gt : te)();
            },
            increaseTimer: function (t) {
                if (ee.timeout) {
                    t = ee.timeout.increase(t);
                    return dt(t, !0), t;
                }
            },
            isTimerRunning: function () {
                return ee.timeout && ee.timeout.isRunning();
            },
            bindClickHandler: function () {
                (oe[0 < arguments.length && void 0 !== arguments[0] ? arguments[0] : "data-swal-template"] = this), ne || (document.body.addEventListener("click", ie), (ne = !0));
            },
        });
    function fe() {
        var t, e;
        Tt.innerParams.get(this) &&
            ((t = Tt.domCache.get(this)),
            at(t.loader),
            (e = t.popup.getElementsByClassName(t.loader.getAttribute("data-button-to-replace"))).length ? rt(e[0], "inline-block") : wt(L()) || wt(q()) || wt(j()) || at(t.actions),
            bt([t.popup, t.actions], $.loading),
            t.popup.removeAttribute("aria-busy"),
            t.popup.removeAttribute("data-loading"),
            (t.confirmButton.disabled = !1),
            (t.denyButton.disabled = !1),
            (t.cancelButton.disabled = !1));
    }
    function me() {
        null === tt.previousBodyPadding &&
            document.body.scrollHeight > window.innerHeight &&
            ((tt.previousBodyPadding = parseInt(window.getComputedStyle(document.body).getPropertyValue("padding-right"))),
            (document.body.style.paddingRight = "".concat(
                tt.previousBodyPadding +
                    (function () {
                        var t = document.createElement("div");
                        (t.className = $["scrollbar-measure"]), document.body.appendChild(t);
                        var e = t.getBoundingClientRect().width - t.clientWidth;
                        return document.body.removeChild(t), e;
                    })(),
                "px"
            )));
    }
    function he() {
        return !!window.MSInputMethodContext && !!document.documentMode;
    }
    function ge() {
        var t = k(),
            e = x();
        t.style.removeProperty("align-items"), e.offsetTop < 0 && (t.style.alignItems = "flex-start");
    }
    var ve = function () {
            navigator.userAgent.match(/(CriOS|FxiOS|EdgiOS|YaBrowser|UCBrowser)/i) || (x().scrollHeight > window.innerHeight - 44 && (k().style.paddingBottom = "".concat(44, "px")));
        },
        be = function () {
            var e,
                t = k();
            (t.ontouchstart = function (t) {
                e = ye(t);
            }),
                (t.ontouchmove = function (t) {
                    e && (t.preventDefault(), t.stopPropagation());
                });
        },
        ye = function (t) {
            var e = t.target,
                n = k();
            return !we(t) && !Ce(t) && (e === n || !(ut(n) || "INPUT" === e.tagName || (ut(E()) && E().contains(e))));
        },
        we = function (t) {
            return t.touches && t.touches.length && "stylus" === t.touches[0].touchType;
        },
        Ce = function (t) {
            return t.touches && 1 < t.touches.length;
        },
        ke = { swalPromiseResolve: new WeakMap() };
    function Ae(t, e, n, o) {
        n
            ? Se(t, o)
            : (Xt().then(function () {
                  return Se(t, o);
              }),
              ee.keydownTarget.removeEventListener("keydown", ee.keydownHandler, { capture: ee.keydownListenerCapture }),
              (ee.keydownHandlerAdded = !1)),
            e.parentNode && !document.body.getAttribute("data-swal2-queue-step") && e.parentNode.removeChild(e),
            U() &&
                (null !== tt.previousBodyPadding && ((document.body.style.paddingRight = "".concat(tt.previousBodyPadding, "px")), (tt.previousBodyPadding = null)),
                F(document.body, $.iosfix) && ((e = parseInt(document.body.style.top, 10)), bt(document.body, $.iosfix), (document.body.style.top = ""), (document.body.scrollTop = -1 * e)),
                "undefined" != typeof window && he() && window.removeEventListener("resize", ge),
                g(document.body.children).forEach(function (t) {
                    t.hasAttribute("data-previous-aria-hidden") ? (t.setAttribute("aria-hidden", t.getAttribute("data-previous-aria-hidden")), t.removeAttribute("data-previous-aria-hidden")) : t.removeAttribute("aria-hidden");
                })),
            bt([document.documentElement, document.body], [$.shown, $["height-auto"], $["no-backdrop"], $["toast-shown"], $["toast-column"]]);
    }
    function xe(t) {
        var e,
            n,
            o,
            i = x();
        i &&
            ((t = Be(t)),
            (e = Tt.innerParams.get(this)) &&
                !F(i, e.hideClass.popup) &&
                ((n = ke.swalPromiseResolve.get(this)), bt(i, e.showClass.popup), vt(i, e.hideClass.popup), (o = k()), bt(o, e.showClass.backdrop), vt(o, e.hideClass.backdrop), Pe(this, i, e), n(t)));
    }
    function Be(t) {
        return void 0 === t ? { isConfirmed: !1, isDenied: !1, isDismissed: !0 } : s({ isConfirmed: !1, isDenied: !1, isDismissed: !1 }, t);
    }
    function Pe(t, e, n) {
        var o = k(),
            i = Bt && lt(e),
            r = n.onClose,
            a = n.onAfterClose,
            c = n.willClose,
            n = n.didClose;
        Ee(e, c, r), i ? Oe(t, e, o, n || a) : Ae(t, o, G(), n || a);
    }
    var Ee = function (t, e, n) {
            null !== e && "function" == typeof e ? e(t) : null !== n && "function" == typeof n && n(t);
        },
        Oe = function (t, e, n, o) {
            (ee.swalCloseEventFinishedCallback = Ae.bind(null, t, n, G(), o)),
                e.addEventListener(Bt, function (t) {
                    t.target === e && (ee.swalCloseEventFinishedCallback(), delete ee.swalCloseEventFinishedCallback);
                });
        },
        Se = function (t, e) {
            setTimeout(function () {
                "function" == typeof e && e(), t._destroy();
            });
        };
    function Te(t, e, n) {
        var o = Tt.domCache.get(t);
        e.forEach(function (t) {
            o[t].disabled = n;
        });
    }
    function Le(t, e) {
        if (!t) return !1;
        if ("radio" === t.type) for (var n = t.parentNode.parentNode.querySelectorAll("input"), o = 0; o < n.length; o++) n[o].disabled = e;
        else t.disabled = e;
    }
    var qe = (function () {
            function n(t, e) {
                a(this, n), (this.callback = t), (this.remaining = e), (this.running = !1), this.start();
            }
            return (
                c(n, [
                    {
                        key: "start",
                        value: function () {
                            return this.running || ((this.running = !0), (this.started = new Date()), (this.id = setTimeout(this.callback, this.remaining))), this.remaining;
                        },
                    },
                    {
                        key: "stop",
                        value: function () {
                            return this.running && ((this.running = !1), clearTimeout(this.id), (this.remaining -= new Date() - this.started)), this.remaining;
                        },
                    },
                    {
                        key: "increase",
                        value: function (t) {
                            var e = this.running;
                            return e && this.stop(), (this.remaining += t), e && this.start(), this.remaining;
                        },
                    },
                    {
                        key: "getTimerLeft",
                        value: function () {
                            return this.running && (this.stop(), this.start()), this.remaining;
                        },
                    },
                    {
                        key: "isRunning",
                        value: function () {
                            return this.running;
                        },
                    },
                ]),
                n
            );
        })(),
        De = {
            email: function (t, e) {
                return /^[a-zA-Z0-9.+_-]+@[a-zA-Z0-9.-]+\.[a-zA-Z0-9-]{2,24}$/.test(t) ? Promise.resolve() : Promise.resolve(e || "Invalid email address");
            },
            url: function (t, e) {
                return /^https?:\/\/(www\.)?[-a-zA-Z0-9@:%._+~#=]{1,256}\.[a-z]{2,63}\b([-a-zA-Z0-9@:%_+.~#?&/=]*)$/.test(t) ? Promise.resolve() : Promise.resolve(e || "Invalid URL");
            },
        };
    function je(t) {
        var e, n;
        (e = t).inputValidator ||
            Object.keys(De).forEach(function (t) {
                e.input === t && (e.inputValidator = De[t]);
            }),
            t.showLoaderOnConfirm &&
                !t.preConfirm &&
                W("showLoaderOnConfirm is set to true, but preConfirm is not defined.\nshowLoaderOnConfirm should be used together with preConfirm, see usage example:\nhttps://sweetalert2.github.io/#ajax-request"),
            (t.animation = Z(t.animation)),
            ((n = t).target && ("string" != typeof n.target || document.querySelector(n.target)) && ("string" == typeof n.target || n.target.appendChild)) || (W('Target parameter is not valid, defaulting to "body"'), (n.target = "body")),
            "string" == typeof t.title && (t.title = t.title.split("\n").join("<br />")),
            kt(t);
    }
    function Ie(t) {
        var e = k(),
            n = x();
        "function" == typeof t.willOpen ? t.willOpen(n) : "function" == typeof t.onBeforeOpen && t.onBeforeOpen(n);
        var o = window.getComputedStyle(document.body).overflowY;
        $e(e, n, t),
            setTimeout(function () {
                Qe(e, n);
            }, 10),
            U() &&
                (Je(e, t.scrollbarPadding, o),
                g(document.body.children).forEach(function (t) {
                    t === k() ||
                        (function (t, e) {
                            if ("function" == typeof t.contains) return t.contains(e);
                        })(t, k()) ||
                        (t.hasAttribute("aria-hidden") && t.setAttribute("data-previous-aria-hidden", t.getAttribute("aria-hidden")), t.setAttribute("aria-hidden", "true"));
                })),
            G() || ee.previousActiveElement || (ee.previousActiveElement = document.activeElement),
            Ze(n, t),
            bt(e, $["no-transition"]);
    }
    function Me(t) {
        var e = x();
        t.target === e && ((t = k()), e.removeEventListener(Bt, Me), (t.style.overflowY = "auto"));
    }
    function He(t, e) {
        t.closePopup({ isConfirmed: !0, value: e });
    }
    function Ve(t, e, n) {
        var o = N();
        if (o.length) return (e += n) === o.length ? (e = 0) : -1 === e && (e = o.length - 1), o[e].focus();
        x().focus();
    }
    var Re = ["swal-title", "swal-html", "swal-footer"],
        Ne = function (t) {
            var n = {};
            return (
                g(t.querySelectorAll("swal-param")).forEach(function (t) {
                    Ye(t, ["name", "value"]);
                    var e = t.getAttribute("name"),
                        t = t.getAttribute("value");
                    "boolean" == typeof se[e] && "false" === t && (t = !1), "object" === r(se[e]) && (t = JSON.parse(t)), (n[e] = t);
                }),
                n
            );
        },
        Ue = function (t) {
            var n = {};
            return (
                g(t.querySelectorAll("swal-button")).forEach(function (t) {
                    Ye(t, ["type", "color", "aria-label"]);
                    var e = t.getAttribute("type");
                    (n["".concat(e, "ButtonText")] = t.innerHTML),
                        (n["show".concat(m(e), "Button")] = !0),
                        t.hasAttribute("color") && (n["".concat(e, "ButtonColor")] = t.getAttribute("color")),
                        t.hasAttribute("aria-label") && (n["".concat(e, "ButtonAriaLabel")] = t.getAttribute("aria-label"));
                }),
                n
            );
        },
        _e = function (t) {
            var e = {},
                t = t.querySelector("swal-image");
            return (
                t &&
                    (Ye(t, ["src", "width", "height", "alt"]),
                    t.hasAttribute("src") && (e.imageUrl = t.getAttribute("src")),
                    t.hasAttribute("width") && (e.imageWidth = t.getAttribute("width")),
                    t.hasAttribute("height") && (e.imageHeight = t.getAttribute("height")),
                    t.hasAttribute("alt") && (e.imageAlt = t.getAttribute("alt"))),
                e
            );
        },
        Fe = function (t) {
            var e = {},
                t = t.querySelector("swal-icon");
            return t && (Ye(t, ["type", "color"]), t.hasAttribute("type") && (e.icon = t.getAttribute("type")), t.hasAttribute("color") && (e.iconColor = t.getAttribute("color")), (e.iconHtml = t.innerHTML)), e;
        },
        ze = function (t) {
            var n = {},
                e = t.querySelector("swal-input");
            e &&
                (Ye(e, ["type", "label", "placeholder", "value"]),
                (n.input = e.getAttribute("type") || "text"),
                e.hasAttribute("label") && (n.inputLabel = e.getAttribute("label")),
                e.hasAttribute("placeholder") && (n.inputPlaceholder = e.getAttribute("placeholder")),
                e.hasAttribute("value") && (n.inputValue = e.getAttribute("value")));
            t = t.querySelectorAll("swal-input-option");
            return (
                t.length &&
                    ((n.inputOptions = {}),
                    g(t).forEach(function (t) {
                        Ye(t, ["value"]);
                        var e = t.getAttribute("value"),
                            t = t.innerHTML;
                        n.inputOptions[e] = t;
                    })),
                n
            );
        },
        We = function (t, e) {
            var n,
                o = {};
            for (n in e) {
                var i = e[n],
                    r = t.querySelector(i);
                r && (Ye(r, []), (o[i.replace(/^swal-/, "")] = r.innerHTML));
            }
            return o;
        },
        Ke = function (e) {
            var n = Re.concat(["swal-param", "swal-button", "swal-image", "swal-icon", "swal-input", "swal-input-option"]);
            g(e.querySelectorAll("*")).forEach(function (t) {
                t.parentNode === e && ((t = t.tagName.toLowerCase()), -1 === n.indexOf(t) && W("Unrecognized element <".concat(t, ">")));
            });
        },
        Ye = function (e, n) {
            g(e.attributes).forEach(function (t) {
                -1 === n.indexOf(t.name) &&
                    W(['Unrecognized attribute "'.concat(t.name, '" on <').concat(e.tagName.toLowerCase(), ">."), "".concat(n.length ? "Allowed attributes are: ".concat(n.join(", ")) : "To set the value, use HTML within the element.")]);
            });
        },
        Ze = function (t, e) {
            "function" == typeof e.didOpen
                ? setTimeout(function () {
                      return e.didOpen(t);
                  })
                : "function" == typeof e.onOpen &&
                  setTimeout(function () {
                      return e.onOpen(t);
                  });
        },
        Qe = function (t, e) {
            Bt && lt(e) ? ((t.style.overflowY = "hidden"), e.addEventListener(Bt, Me)) : (t.style.overflowY = "auto");
        },
        Je = function (t, e, n) {
            var o;
            ((/iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream) || ("MacIntel" === navigator.platform && 1 < navigator.maxTouchPoints)) &&
                !F(document.body, $.iosfix) &&
                ((o = document.body.scrollTop), (document.body.style.top = "".concat(-1 * o, "px")), vt(document.body, $.iosfix), be(), ve()),
                "undefined" != typeof window && he() && (ge(), window.addEventListener("resize", ge)),
                e && "hidden" !== n && me(),
                setTimeout(function () {
                    t.scrollTop = 0;
                });
        },
        $e = function (t, e, n) {
            vt(t, n.showClass.backdrop),
                e.style.setProperty("opacity", "0", "important"),
                rt(e),
                setTimeout(function () {
                    vt(e, n.showClass.popup), e.style.removeProperty("opacity");
                }, 10),
                vt([document.documentElement, document.body], $.shown),
                n.heightAuto && n.backdrop && !n.toast && vt([document.documentElement, document.body], $["height-auto"]);
        },
        Xe = function (t) {
            return t.checked ? 1 : 0;
        },
        Ge = function (t) {
            return t.checked ? t.value : null;
        },
        tn = function (t) {
            return t.files.length ? (null !== t.getAttribute("multiple") ? t.files : t.files[0]) : null;
        },
        en = function (e, n) {
            function o(t) {
                return on[n.input](i, rn(t), n);
            }
            var i = E();
            b(n.inputOptions) || w(n.inputOptions)
                ? ($t(),
                  y(n.inputOptions).then(function (t) {
                      e.hideLoading(), o(t);
                  }))
                : "object" === r(n.inputOptions)
                ? o(n.inputOptions)
                : K("Unexpected type of inputOptions! Expected object, Map or Promise, got ".concat(r(n.inputOptions)));
        },
        nn = function (e, n) {
            var o = e.getInput();
            at(o),
                y(n.inputValue)
                    .then(function (t) {
                        (o.value = "number" === n.input ? parseFloat(t) || 0 : "".concat(t)), rt(o), o.focus(), e.hideLoading();
                    })
                    .catch(function (t) {
                        K("Error in inputValue promise: ".concat(t)), (o.value = ""), rt(o), o.focus(), e.hideLoading();
                    });
        },
        on = {
            select: function (t, e, i) {
                function o(t, e, n) {
                    var o = document.createElement("option");
                    (o.value = n), _(o, e), (o.selected = an(n, i.inputValue)), t.appendChild(o);
                }
                var r = yt(t, $.select);
                e.forEach(function (t) {
                    var e,
                        n = t[0],
                        t = t[1];
                    Array.isArray(t)
                        ? (((e = document.createElement("optgroup")).label = n),
                          (e.disabled = !1),
                          r.appendChild(e),
                          t.forEach(function (t) {
                              return o(e, t[1], t[0]);
                          }))
                        : o(r, t, n);
                }),
                    r.focus();
            },
            radio: function (t, e, i) {
                var r = yt(t, $.radio);
                e.forEach(function (t) {
                    var e = t[0],
                        n = t[1],
                        o = document.createElement("input"),
                        t = document.createElement("label");
                    (o.type = "radio"), (o.name = $.radio), (o.value = e), an(e, i.inputValue) && (o.checked = !0);
                    e = document.createElement("span");
                    _(e, n), (e.className = $.label), t.appendChild(o), t.appendChild(e), r.appendChild(t);
                });
                e = r.querySelectorAll("input");
                e.length && e[0].focus();
            },
        },
        rn = function n(o) {
            var i = [];
            return (
                "undefined" != typeof Map && o instanceof Map
                    ? o.forEach(function (t, e) {
                          "object" === r(t) && (t = n(t)), i.push([e, t]);
                      })
                    : Object.keys(o).forEach(function (t) {
                          var e = o[t];
                          "object" === r(e) && (e = n(e)), i.push([t, e]);
                      }),
                i
            );
        },
        an = function (t, e) {
            return e && e.toString() === t.toString();
        },
        cn = function (t, e, n) {
            var o = (function (t, e) {
                var n = t.getInput();
                if (!n) return null;
                switch (e.input) {
                    case "checkbox":
                        return Xe(n);
                    case "radio":
                        return Ge(n);
                    case "file":
                        return tn(n);
                    default:
                        return e.inputAutoTrim ? n.value.trim() : n.value;
                }
            })(t, e);
            e.inputValidator ? sn(t, e, o) : t.getInput().checkValidity() ? ("deny" === n ? un : ln)(t, e, o) : (t.enableButtons(), t.showValidationMessage(e.validationMessage));
        },
        sn = function (e, n, o) {
            e.disableInput(),
                Promise.resolve()
                    .then(function () {
                        return y(n.inputValidator(o, n.validationMessage));
                    })
                    .then(function (t) {
                        e.enableButtons(), e.enableInput(), t ? e.showValidationMessage(t) : ln(e, n, o);
                    });
        },
        un = function (e, t, n) {
            t.showLoaderOnDeny && $t(q()),
                t.preDeny
                    ? Promise.resolve()
                          .then(function () {
                              return y(t.preDeny(n, t.validationMessage));
                          })
                          .then(function (t) {
                              !1 === t ? e.hideLoading() : e.closePopup({ isDenied: !0, value: void 0 === t ? n : t });
                          })
                    : e.closePopup({ isDenied: !0, value: n });
        },
        ln = function (e, t, n) {
            t.showLoaderOnConfirm && $t(),
                t.preConfirm
                    ? (e.resetValidationMessage(),
                      Promise.resolve()
                          .then(function () {
                              return y(t.preConfirm(n, t.validationMessage));
                          })
                          .then(function (t) {
                              wt(T()) || !1 === t ? e.hideLoading() : He(e, void 0 === t ? n : t);
                          }))
                    : He(e, n);
        },
        dn = ["ArrowRight", "ArrowDown", "Right", "Down"],
        pn = ["ArrowLeft", "ArrowUp", "Left", "Up"],
        fn = ["Escape", "Esc"],
        mn = function (t, e, n) {
            var o = Tt.innerParams.get(t);
            o.stopKeydownPropagation && e.stopPropagation(), "Enter" === e.key ? hn(t, e, o) : "Tab" === e.key ? gn(e, o) : -1 !== [].concat(dn, pn).indexOf(e.key) ? vn(e.key) : -1 !== fn.indexOf(e.key) && bn(e, o, n);
        },
        hn = function (t, e, n) {
            e.isComposing || (e.target && t.getInput() && e.target.outerHTML === t.getInput().outerHTML && -1 === ["textarea", "file"].indexOf(n.input) && (_t(), e.preventDefault()));
        },
        gn = function (t, e) {
            for (var n = t.target, o = N(), i = -1, r = 0; r < o.length; r++)
                if (n === o[r]) {
                    i = r;
                    break;
                }
            t.shiftKey ? Ve(0, i, -1) : Ve(0, i, 1), t.stopPropagation(), t.preventDefault();
        },
        vn = function (t) {
            -1 !== [L(), q(), j()].indexOf(document.activeElement) && ((t = -1 !== dn.indexOf(t) ? "nextElementSibling" : "previousElementSibling"), (t = document.activeElement[t]) && t.focus());
        },
        bn = function (t, e, n) {
            Z(e.allowEscapeKey) && (t.preventDefault(), n(Q.esc));
        },
        yn = function (e, t, n) {
            t.popup.onclick = function () {
                var t = Tt.innerParams.get(e);
                t.showConfirmButton || t.showDenyButton || t.showCancelButton || t.showCloseButton || t.timer || t.input || n(Q.close);
            };
        },
        wn = !1,
        Cn = function (e) {
            e.popup.onmousedown = function () {
                e.container.onmouseup = function (t) {
                    (e.container.onmouseup = void 0), t.target === e.container && (wn = !0);
                };
            };
        },
        kn = function (e) {
            e.container.onmousedown = function () {
                e.popup.onmouseup = function (t) {
                    (e.popup.onmouseup = void 0), (t.target !== e.popup && !e.popup.contains(t.target)) || (wn = !0);
                };
            };
        },
        An = function (n, o, i) {
            o.container.onclick = function (t) {
                var e = Tt.innerParams.get(n);
                wn ? (wn = !1) : t.target === o.container && Z(e.allowOutsideClick) && i(Q.backdrop);
            };
        };
    function xn(t, e) {
        var n = (function (t) {
                t = "string" == typeof t.template ? document.querySelector(t.template) : t.template;
                if (!t) return {};
                t = t.content || t;
                return Ke(t), s(Ne(t), Ue(t), _e(t), Fe(t), ze(t), We(t, Re));
            })(t),
            o = s({}, se.showClass, e.showClass, n.showClass, t.showClass),
            i = s({}, se.hideClass, e.hideClass, n.hideClass, t.hideClass);
        return ((n = s({}, se, e, n, t)).showClass = o), (n.hideClass = i), !1 === t.animation && ((n.showClass = { popup: "swal2-noanimation", backdrop: "swal2-noanimation" }), (n.hideClass = {})), n;
    }
    function Bn(a, c, s) {
        return new Promise(function (t) {
            function e(t) {
                a.closePopup({ isDismissed: !0, dismiss: t });
            }
            var n, o, i, r;
            ke.swalPromiseResolve.set(a, t),
                (c.confirmButton.onclick = function () {
                    return (e = s), (t = a).disableButtons(), void (e.input ? cn(t, e, "confirm") : ln(t, e, !0));
                    var t, e;
                }),
                (c.denyButton.onclick = function () {
                    return (e = s), (t = a).disableButtons(), void (e.returnInputValueOnDeny ? cn(t, e, "deny") : un(t, e, !1));
                    var t, e;
                }),
                (c.cancelButton.onclick = function () {
                    return (t = e), a.disableButtons(), void t(Q.cancel);
                    var t;
                }),
                (c.closeButton.onclick = function () {
                    return e(Q.close);
                }),
                (n = a),
                (r = c),
                (t = e),
                Tt.innerParams.get(n).toast ? yn(n, r, t) : (Cn(r), kn(r), An(n, r, t)),
                (o = a),
                (r = s),
                (i = e),
                (t = ee).keydownTarget && t.keydownHandlerAdded && (t.keydownTarget.removeEventListener("keydown", t.keydownHandler, { capture: t.keydownListenerCapture }), (t.keydownHandlerAdded = !1)),
                r.toast ||
                    ((t.keydownHandler = function (t) {
                        return mn(o, t, i);
                    }),
                    (t.keydownTarget = r.keydownListenerCapture ? window : x()),
                    (t.keydownListenerCapture = r.keydownListenerCapture),
                    t.keydownTarget.addEventListener("keydown", t.keydownHandler, { capture: t.keydownListenerCapture }),
                    (t.keydownHandlerAdded = !0)),
                (s.toast && (s.input || s.footer || s.showCloseButton) ? vt : bt)(document.body, $["toast-column"]),
                (r = a),
                "select" === (t = s).input || "radio" === t.input ? en(r, t) : -1 !== ["text", "email", "number", "tel", "textarea"].indexOf(t.input) && (b(t.inputValue) || w(t.inputValue)) && nn(r, t),
                Ie(s),
                En(ee, s, e),
                On(c, s),
                setTimeout(function () {
                    c.container.scrollTop = 0;
                });
        });
    }
    function Pn(t) {
        var e = { popup: x(), container: k(), content: E(), actions: I(), confirmButton: L(), denyButton: q(), cancelButton: j(), loader: D(), closeButton: R(), validationMessage: T(), progressSteps: S() };
        return Tt.domCache.set(t, e), e;
    }
    var En = function (t, e, n) {
            var o = V();
            at(o),
                e.timer &&
                    ((t.timeout = new qe(function () {
                        n("timer"), delete t.timeout;
                    }, e.timer)),
                    e.timerProgressBar &&
                        (rt(o),
                        setTimeout(function () {
                            t.timeout && t.timeout.running && dt(e.timer);
                        })));
        },
        On = function (t, e) {
            if (!e.toast) return Z(e.allowEnterKey) ? void (Sn(t, e) || Ve(0, -1, 1)) : Tn();
        },
        Sn = function (t, e) {
            return e.focusDeny && wt(t.denyButton) ? (t.denyButton.focus(), !0) : e.focusCancel && wt(t.cancelButton) ? (t.cancelButton.focus(), !0) : !(!e.focusConfirm || !wt(t.confirmButton)) && (t.confirmButton.focus(), !0);
        },
        Tn = function () {
            document.activeElement && "function" == typeof document.activeElement.blur && document.activeElement.blur();
        };
    function Ln(t) {
        "function" == typeof t.didDestroy ? t.didDestroy() : "function" == typeof t.onDestroy && t.onDestroy();
    }
    function qn(t) {
        delete t.params, delete ee.keydownHandler, delete ee.keydownTarget, jn(Tt), jn(ke);
    }
    var Dn,
        jn = function (t) {
            for (var e in t) t[e] = new WeakMap();
        },
        J = Object.freeze({
            hideLoading: fe,
            disableLoading: fe,
            getInput: function (t) {
                var e = Tt.innerParams.get(t || this);
                return (t = Tt.domCache.get(t || this)) ? et(t.content, e.input) : null;
            },
            close: xe,
            closePopup: xe,
            closeModal: xe,
            closeToast: xe,
            enableButtons: function () {
                Te(this, ["confirmButton", "denyButton", "cancelButton"], !1);
            },
            disableButtons: function () {
                Te(this, ["confirmButton", "denyButton", "cancelButton"], !0);
            },
            enableInput: function () {
                return Le(this.getInput(), !1);
            },
            disableInput: function () {
                return Le(this.getInput(), !0);
            },
            showValidationMessage: function (t) {
                var e = Tt.domCache.get(this),
                    n = Tt.innerParams.get(this);
                _(e.validationMessage, t),
                    (e.validationMessage.className = $["validation-message"]),
                    n.customClass && n.customClass.validationMessage && vt(e.validationMessage, n.customClass.validationMessage),
                    rt(e.validationMessage),
                    (e = this.getInput()) && (e.setAttribute("aria-invalid", !0), e.setAttribute("aria-describedBy", $["validation-message"]), nt(e), vt(e, $.inputerror));
            },
            resetValidationMessage: function () {
                var t = Tt.domCache.get(this);
                t.validationMessage && at(t.validationMessage), (t = this.getInput()) && (t.removeAttribute("aria-invalid"), t.removeAttribute("aria-describedBy"), bt(t, $.inputerror));
            },
            getProgressSteps: function () {
                return Tt.domCache.get(this).progressSteps;
            },
            _main: function (t) {
                var e = 1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : {};
                return (
                    ce(s({}, e, t)),
                    ee.currentInstance && ee.currentInstance._destroy(),
                    (ee.currentInstance = this),
                    je((t = xn(t, e))),
                    Object.freeze(t),
                    ee.timeout && (ee.timeout.stop(), delete ee.timeout),
                    clearTimeout(ee.restoreFocusTimeout),
                    (e = Pn(this)),
                    Ut(this, t),
                    Tt.innerParams.set(this, t),
                    Bn(this, e, t)
                );
            },
            update: function (e) {
                var t = x(),
                    n = Tt.innerParams.get(this);
                if (!t || F(t, n.hideClass.popup)) return W("You're trying to update the closed or closing popup, that won't work. Use the update() method in preConfirm parameter or show a new popup.");
                var o = {};
                Object.keys(e).forEach(function (t) {
                    Mn.isUpdatableParameter(t)
                        ? (o[t] = e[t])
                        : W(
                              'Invalid parameter to update: "'.concat(
                                  t,
                                  '". Updatable params are listed here: https://github.com/sweetalert2/sweetalert2/blob/master/src/utils/params.js\n\nIf you think this parameter should be updatable, request it here: https://github.com/sweetalert2/sweetalert2/issues/new?template=02_feature_request.md'
                              )
                          );
                }),
                    (n = s({}, n, o)),
                    Ut(this, n),
                    Tt.innerParams.set(this, n),
                    Object.defineProperties(this, { params: { value: s({}, this.params, e), writable: !1, enumerable: !0 } });
            },
            _destroy: function () {
                var t = Tt.domCache.get(this),
                    e = Tt.innerParams.get(this);
                e &&
                    (t.popup && ee.swalCloseEventFinishedCallback && (ee.swalCloseEventFinishedCallback(), delete ee.swalCloseEventFinishedCallback),
                    ee.deferDisposalTimer && (clearTimeout(ee.deferDisposalTimer), delete ee.deferDisposalTimer),
                    Ln(e),
                    qn(this));
            },
        }),
        In = (function () {
            function i() {
                if ((a(this, i), "undefined" != typeof window)) {
                    "undefined" == typeof Promise &&
                        K("This package requires a Promise library, please include a shim to enable it in this browser (See: https://github.com/sweetalert2/sweetalert2/wiki/Migration-from-SweetAlert-to-SweetAlert2#1-ie-support)"),
                        (Dn = this);
                    for (var t = arguments.length, e = new Array(t), n = 0; n < t; n++) e[n] = arguments[n];
                    var o = Object.freeze(this.constructor.argsToParams(e));
                    Object.defineProperties(this, { params: { value: o, writable: !1, enumerable: !0, configurable: !0 } });
                    o = this._main(this.params);
                    Tt.promise.set(this, o);
                }
            }
            return (
                c(i, [
                    {
                        key: "then",
                        value: function (t) {
                            return Tt.promise.get(this).then(t);
                        },
                    },
                    {
                        key: "finally",
                        value: function (t) {
                            return Tt.promise.get(this).finally(t);
                        },
                    },
                ]),
                i
            );
        })();
    s(In.prototype, J),
        s(In, pe),
        Object.keys(J).forEach(function (t) {
            In[t] = function () {
                if (Dn) return Dn[t].apply(Dn, arguments);
            };
        }),
        (In.DismissReason = Q),
        (In.version = "10.14.0");
    var Mn = In;
    return (Mn.default = Mn);
}),
    void 0 !== this && this.Sweetalert2 && (this.swal = this.sweetAlert = this.Swal = this.SweetAlert = this.Sweetalert2);
"undefined" != typeof document &&
    (function (e, t) {
        var n = e.createElement("style");
        if ((e.getElementsByTagName("head")[0].appendChild(n), n.styleSheet)) n.styleSheet.disabled || (n.styleSheet.cssText = t);
        else
            try {
                n.innerHTML = t;
            } catch (e) {
                n.innerText = t;
            }
    })(
        document,
        '.swal2-popup.swal2-toast{flex-direction:row;align-items:center;width:auto;padding:.625em;overflow-y:hidden;background:#fff;box-shadow:0 0 .625em #d9d9d9}.swal2-popup.swal2-toast .swal2-header{flex-direction:row;padding:0}.swal2-popup.swal2-toast .swal2-title{flex-grow:1;justify-content:flex-start;margin:0 .6em;font-size:1em}.swal2-popup.swal2-toast .swal2-footer{margin:.5em 0 0;padding:.5em 0 0;font-size:.8em}.swal2-popup.swal2-toast .swal2-close{position:static;width:.8em;height:.8em;line-height:.8}.swal2-popup.swal2-toast .swal2-content{justify-content:flex-start;padding:0;font-size:1em}.swal2-popup.swal2-toast .swal2-icon{width:2em;min-width:2em;height:2em;margin:0}.swal2-popup.swal2-toast .swal2-icon .swal2-icon-content{display:flex;align-items:center;font-size:1.8em;font-weight:700}@media all and (-ms-high-contrast:none),(-ms-high-contrast:active){.swal2-popup.swal2-toast .swal2-icon .swal2-icon-content{font-size:.25em}}.swal2-popup.swal2-toast .swal2-icon.swal2-success .swal2-success-ring{width:2em;height:2em}.swal2-popup.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line]{top:.875em;width:1.375em}.swal2-popup.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=left]{left:.3125em}.swal2-popup.swal2-toast .swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=right]{right:.3125em}.swal2-popup.swal2-toast .swal2-actions{flex-basis:auto!important;width:auto;height:auto;margin:0 .3125em;padding:0}.swal2-popup.swal2-toast .swal2-styled{margin:.125em .3125em;padding:.3125em .625em;font-size:1em}.swal2-popup.swal2-toast .swal2-styled:focus{box-shadow:0 0 0 1px #fff,0 0 0 3px rgba(100,150,200,.5)}.swal2-popup.swal2-toast .swal2-success{border-color:#a5dc86}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-circular-line]{position:absolute;width:1.6em;height:3em;transform:rotate(45deg);border-radius:50%}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-circular-line][class$=left]{top:-.8em;left:-.5em;transform:rotate(-45deg);transform-origin:2em 2em;border-radius:4em 0 0 4em}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-circular-line][class$=right]{top:-.25em;left:.9375em;transform-origin:0 1.5em;border-radius:0 4em 4em 0}.swal2-popup.swal2-toast .swal2-success .swal2-success-ring{width:2em;height:2em}.swal2-popup.swal2-toast .swal2-success .swal2-success-fix{top:0;left:.4375em;width:.4375em;height:2.6875em}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-line]{height:.3125em}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-line][class$=tip]{top:1.125em;left:.1875em;width:.75em}.swal2-popup.swal2-toast .swal2-success [class^=swal2-success-line][class$=long]{top:.9375em;right:.1875em;width:1.375em}.swal2-popup.swal2-toast .swal2-success.swal2-icon-show .swal2-success-line-tip{-webkit-animation:swal2-toast-animate-success-line-tip .75s;animation:swal2-toast-animate-success-line-tip .75s}.swal2-popup.swal2-toast .swal2-success.swal2-icon-show .swal2-success-line-long{-webkit-animation:swal2-toast-animate-success-line-long .75s;animation:swal2-toast-animate-success-line-long .75s}.swal2-popup.swal2-toast.swal2-show{-webkit-animation:swal2-toast-show .5s;animation:swal2-toast-show .5s}.swal2-popup.swal2-toast.swal2-hide{-webkit-animation:swal2-toast-hide .1s forwards;animation:swal2-toast-hide .1s forwards}.swal2-container{display:flex;position:fixed;z-index:1060;top:0;right:0;bottom:0;left:0;flex-direction:row;align-items:center;justify-content:center;padding:.625em;overflow-x:hidden;transition:background-color .1s;-webkit-overflow-scrolling:touch}.swal2-container.swal2-backdrop-show,.swal2-container.swal2-noanimation{background:rgba(0,0,0,.4)}.swal2-container.swal2-backdrop-hide{background:0 0!important}.swal2-container.swal2-top{align-items:flex-start}.swal2-container.swal2-top-left,.swal2-container.swal2-top-start{align-items:flex-start;justify-content:flex-start}.swal2-container.swal2-top-end,.swal2-container.swal2-top-right{align-items:flex-start;justify-content:flex-end}.swal2-container.swal2-center{align-items:center}.swal2-container.swal2-center-left,.swal2-container.swal2-center-start{align-items:center;justify-content:flex-start}.swal2-container.swal2-center-end,.swal2-container.swal2-center-right{align-items:center;justify-content:flex-end}.swal2-container.swal2-bottom{align-items:flex-end}.swal2-container.swal2-bottom-left,.swal2-container.swal2-bottom-start{align-items:flex-end;justify-content:flex-start}.swal2-container.swal2-bottom-end,.swal2-container.swal2-bottom-right{align-items:flex-end;justify-content:flex-end}.swal2-container.swal2-bottom-end>:first-child,.swal2-container.swal2-bottom-left>:first-child,.swal2-container.swal2-bottom-right>:first-child,.swal2-container.swal2-bottom-start>:first-child,.swal2-container.swal2-bottom>:first-child{margin-top:auto}.swal2-container.swal2-grow-fullscreen>.swal2-modal{display:flex!important;flex:1;align-self:stretch;justify-content:center}.swal2-container.swal2-grow-row>.swal2-modal{display:flex!important;flex:1;align-content:center;justify-content:center}.swal2-container.swal2-grow-column{flex:1;flex-direction:column}.swal2-container.swal2-grow-column.swal2-bottom,.swal2-container.swal2-grow-column.swal2-center,.swal2-container.swal2-grow-column.swal2-top{align-items:center}.swal2-container.swal2-grow-column.swal2-bottom-left,.swal2-container.swal2-grow-column.swal2-bottom-start,.swal2-container.swal2-grow-column.swal2-center-left,.swal2-container.swal2-grow-column.swal2-center-start,.swal2-container.swal2-grow-column.swal2-top-left,.swal2-container.swal2-grow-column.swal2-top-start{align-items:flex-start}.swal2-container.swal2-grow-column.swal2-bottom-end,.swal2-container.swal2-grow-column.swal2-bottom-right,.swal2-container.swal2-grow-column.swal2-center-end,.swal2-container.swal2-grow-column.swal2-center-right,.swal2-container.swal2-grow-column.swal2-top-end,.swal2-container.swal2-grow-column.swal2-top-right{align-items:flex-end}.swal2-container.swal2-grow-column>.swal2-modal{display:flex!important;flex:1;align-content:center;justify-content:center}.swal2-container.swal2-no-transition{transition:none!important}.swal2-container:not(.swal2-top):not(.swal2-top-start):not(.swal2-top-end):not(.swal2-top-left):not(.swal2-top-right):not(.swal2-center-start):not(.swal2-center-end):not(.swal2-center-left):not(.swal2-center-right):not(.swal2-bottom):not(.swal2-bottom-start):not(.swal2-bottom-end):not(.swal2-bottom-left):not(.swal2-bottom-right):not(.swal2-grow-fullscreen)>.swal2-modal{margin:auto}@media all and (-ms-high-contrast:none),(-ms-high-contrast:active){.swal2-container .swal2-modal{margin:0!important}}.swal2-popup{display:none;position:relative;box-sizing:border-box;flex-direction:column;justify-content:center;width:32em;max-width:100%;padding:1.25em;border:none;border-radius:5px;background:#fff;font-family:inherit;font-size:1rem}.swal2-popup:focus{outline:0}.swal2-popup.swal2-loading{overflow-y:hidden}.swal2-header{display:flex;flex-direction:column;align-items:center;padding:0 1.8em}.swal2-title{position:relative;max-width:100%;margin:0 0 .4em;padding:0;color:#595959;font-size:1.875em;font-weight:600;text-align:center;text-transform:none;word-wrap:break-word}.swal2-actions{display:flex;z-index:1;box-sizing:border-box;flex-wrap:wrap;align-items:center;justify-content:center;width:100%;margin:1.25em auto 0;padding:0 1.6em}.swal2-actions:not(.swal2-loading) .swal2-styled[disabled]{opacity:.4}.swal2-actions:not(.swal2-loading) .swal2-styled:hover{background-image:linear-gradient(rgba(0,0,0,.1),rgba(0,0,0,.1))}.swal2-actions:not(.swal2-loading) .swal2-styled:active{background-image:linear-gradient(rgba(0,0,0,.2),rgba(0,0,0,.2))}.swal2-loader{display:none;align-items:center;justify-content:center;width:2.2em;height:2.2em;margin:0 1.875em;-webkit-animation:swal2-rotate-loading 1.5s linear 0s infinite normal;animation:swal2-rotate-loading 1.5s linear 0s infinite normal;border-width:.25em;border-style:solid;border-radius:100%;border-color:#2778c4 transparent #2778c4 transparent}.swal2-styled{margin:.3125em;padding:.625em 1.1em;box-shadow:none;font-weight:500}.swal2-styled:not([disabled]){cursor:pointer}.swal2-styled.swal2-confirm{border:0;border-radius:.25em;background:initial;background-color:#2778c4;color:#fff;font-size:1.0625em}.swal2-styled.swal2-deny{border:0;border-radius:.25em;background:initial;background-color:#d14529;color:#fff;font-size:1.0625em}.swal2-styled.swal2-cancel{border:0;border-radius:.25em;background:initial;background-color:#757575;color:#fff;font-size:1.0625em}.swal2-styled:focus{outline:0;box-shadow:0 0 0 3px rgba(100,150,200,.5)}.swal2-styled::-moz-focus-inner{border:0}.swal2-footer{justify-content:center;margin:1.25em 0 0;padding:1em 0 0;border-top:1px solid #eee;color:#545454;font-size:1em}.swal2-timer-progress-bar-container{position:absolute;right:0;bottom:0;left:0;height:.25em;overflow:hidden;border-bottom-right-radius:5px;border-bottom-left-radius:5px}.swal2-timer-progress-bar{width:100%;height:.25em;background:rgba(0,0,0,.2)}.swal2-image{max-width:100%;margin:1.25em auto}.swal2-close{position:absolute;z-index:2;top:0;right:0;align-items:center;justify-content:center;width:1.2em;height:1.2em;padding:0;overflow:hidden;transition:color .1s ease-out;border:none;border-radius:5px;background:0 0;color:#ccc;font-family:serif;font-size:2.5em;line-height:1.2;cursor:pointer}.swal2-close:hover{transform:none;background:0 0;color:#f27474}.swal2-close:focus{outline:0;box-shadow:inset 0 0 0 3px rgba(100,150,200,.5)}.swal2-close::-moz-focus-inner{border:0}.swal2-content{z-index:1;justify-content:center;margin:0;padding:0 1.6em;color:#545454;font-size:1.125em;font-weight:400;line-height:normal;text-align:center;word-wrap:break-word}.swal2-checkbox,.swal2-file,.swal2-input,.swal2-radio,.swal2-select,.swal2-textarea{margin:1em auto}.swal2-file,.swal2-input,.swal2-textarea{box-sizing:border-box;width:100%;transition:border-color .3s,box-shadow .3s;border:1px solid #d9d9d9;border-radius:.1875em;background:inherit;box-shadow:inset 0 1px 1px rgba(0,0,0,.06);color:inherit;font-size:1.125em}.swal2-file.swal2-inputerror,.swal2-input.swal2-inputerror,.swal2-textarea.swal2-inputerror{border-color:#f27474!important;box-shadow:0 0 2px #f27474!important}.swal2-file:focus,.swal2-input:focus,.swal2-textarea:focus{border:1px solid #b4dbed;outline:0;box-shadow:0 0 0 3px rgba(100,150,200,.5)}.swal2-file::-moz-placeholder,.swal2-input::-moz-placeholder,.swal2-textarea::-moz-placeholder{color:#ccc}.swal2-file:-ms-input-placeholder,.swal2-input:-ms-input-placeholder,.swal2-textarea:-ms-input-placeholder{color:#ccc}.swal2-file::placeholder,.swal2-input::placeholder,.swal2-textarea::placeholder{color:#ccc}.swal2-range{margin:1em auto;background:#fff}.swal2-range input{width:80%}.swal2-range output{width:20%;color:inherit;font-weight:600;text-align:center}.swal2-range input,.swal2-range output{height:2.625em;padding:0;font-size:1.125em;line-height:2.625em}.swal2-input{height:2.625em;padding:0 .75em}.swal2-input[type=number]{max-width:10em}.swal2-file{background:inherit;font-size:1.125em}.swal2-textarea{height:6.75em;padding:.75em}.swal2-select{min-width:50%;max-width:100%;padding:.375em .625em;background:inherit;color:inherit;font-size:1.125em}.swal2-checkbox,.swal2-radio{align-items:center;justify-content:center;background:#fff;color:inherit}.swal2-checkbox label,.swal2-radio label{margin:0 .6em;font-size:1.125em}.swal2-checkbox input,.swal2-radio input{margin:0 .4em}.swal2-input-label{display:flex;justify-content:center;margin:1em auto}.swal2-validation-message{display:none;align-items:center;justify-content:center;margin:0 -2.7em;padding:.625em;overflow:hidden;background:#f0f0f0;color:#666;font-size:1em;font-weight:300}.swal2-validation-message::before{content:"!";display:inline-block;width:1.5em;min-width:1.5em;height:1.5em;margin:0 .625em;border-radius:50%;background-color:#f27474;color:#fff;font-weight:600;line-height:1.5em;text-align:center}.swal2-icon{position:relative;box-sizing:content-box;justify-content:center;width:5em;height:5em;margin:1.25em auto 1.875em;border:.25em solid transparent;border-radius:50%;font-family:inherit;line-height:5em;cursor:default;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.swal2-icon .swal2-icon-content{display:flex;align-items:center;font-size:3.75em}.swal2-icon.swal2-error{border-color:#f27474;color:#f27474}.swal2-icon.swal2-error .swal2-x-mark{position:relative;flex-grow:1;zoom:1}.swal2-icon.swal2-error [class^=swal2-x-mark-line]{display:block;position:absolute;top:2.3125em;width:2.9375em;height:.3125em;border-radius:.125em;background-color:#f27474}.swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=left]{left:1.0625em;transform:rotate(45deg)}.swal2-icon.swal2-error [class^=swal2-x-mark-line][class$=right]{right:1em;transform:rotate(-45deg)}.swal2-icon.swal2-error.swal2-icon-show{-webkit-animation:swal2-animate-error-icon .5s;animation:swal2-animate-error-icon .5s}.swal2-icon.swal2-error.swal2-icon-show .swal2-x-mark{-webkit-animation:swal2-animate-error-x-mark .5s;animation:swal2-animate-error-x-mark .5s}.swal2-icon.swal2-warning{border-color:#facea8;color:#f8bb86}.swal2-icon.swal2-info{border-color:#9de0f6;color:#3fc3ee}.swal2-icon.swal2-question{border-color:#c9dae1;color:#87adbd}.swal2-icon.swal2-success{border-color:#a5dc86;color:#a5dc86}.swal2-icon.swal2-success [class^=swal2-success-circular-line]{position:absolute;width:3.75em;height:7.5em;transform:rotate(45deg);border-radius:50%}.swal2-icon.swal2-success [class^=swal2-success-circular-line][class$=left]{top:-.4375em;left:-2.0635em;zoom:1;transform:rotate(-45deg);transform-origin:3.75em 3.75em;border-radius:7.5em 0 0 7.5em}.swal2-icon.swal2-success [class^=swal2-success-circular-line][class$=right]{top:-.6875em;left:1.875em;zoom:1;transform:rotate(-45deg);transform-origin:0 3.75em;border-radius:0 7.5em 7.5em 0}.swal2-icon.swal2-success .swal2-success-ring{position:absolute;z-index:2;top:-.25em;left:-.25em;box-sizing:content-box;width:100%;height:100%;zoom:1;border:.25em solid rgba(165,220,134,.3);border-radius:50%}.swal2-icon.swal2-success .swal2-success-fix{position:absolute;z-index:1;top:.5em;left:1.625em;width:.4375em;height:5.625em;zoom:1;transform:rotate(-45deg)}.swal2-icon.swal2-success [class^=swal2-success-line]{display:block;position:absolute;z-index:2;height:.3125em;zoom:1;border-radius:.125em;background-color:#a5dc86}.swal2-icon.swal2-success [class^=swal2-success-line][class$=tip]{top:2.875em;left:.8125em;width:1.5625em;transform:rotate(45deg)}.swal2-icon.swal2-success [class^=swal2-success-line][class$=long]{top:2.375em;right:.5em;width:2.9375em;transform:rotate(-45deg)}.swal2-icon.swal2-success.swal2-icon-show .swal2-success-line-tip{-webkit-animation:swal2-animate-success-line-tip .75s;animation:swal2-animate-success-line-tip .75s}.swal2-icon.swal2-success.swal2-icon-show .swal2-success-line-long{-webkit-animation:swal2-animate-success-line-long .75s;animation:swal2-animate-success-line-long .75s}.swal2-icon.swal2-success.swal2-icon-show .swal2-success-circular-line-right{-webkit-animation:swal2-rotate-success-circular-line 4.25s ease-in;animation:swal2-rotate-success-circular-line 4.25s ease-in}.swal2-progress-steps{flex-wrap:wrap;align-items:center;max-width:100%;margin:0 0 1.25em;padding:0;background:inherit;font-weight:600}.swal2-progress-steps li{display:inline-block;position:relative}.swal2-progress-steps .swal2-progress-step{z-index:20;flex-shrink:0;width:2em;height:2em;border-radius:2em;background:#2778c4;color:#fff;line-height:2em;text-align:center}.swal2-progress-steps .swal2-progress-step.swal2-active-progress-step{background:#2778c4}.swal2-progress-steps .swal2-progress-step.swal2-active-progress-step~.swal2-progress-step{background:#add8e6;color:#fff}.swal2-progress-steps .swal2-progress-step.swal2-active-progress-step~.swal2-progress-step-line{background:#add8e6}.swal2-progress-steps .swal2-progress-step-line{z-index:10;flex-shrink:0;width:2.5em;height:.4em;margin:0 -1px;background:#2778c4}[class^=swal2]{-webkit-tap-highlight-color:transparent}.swal2-show{-webkit-animation:swal2-show .3s;animation:swal2-show .3s}.swal2-hide{-webkit-animation:swal2-hide .15s forwards;animation:swal2-hide .15s forwards}.swal2-noanimation{transition:none}.swal2-scrollbar-measure{position:absolute;top:-9999px;width:50px;height:50px;overflow:scroll}.swal2-rtl .swal2-close{right:auto;left:0}.swal2-rtl .swal2-timer-progress-bar{right:0;left:auto}@supports (-ms-accelerator:true){.swal2-range input{width:100%!important}.swal2-range output{display:none}}@media all and (-ms-high-contrast:none),(-ms-high-contrast:active){.swal2-range input{width:100%!important}.swal2-range output{display:none}}@-webkit-keyframes swal2-toast-show{0%{transform:translateY(-.625em) rotateZ(2deg)}33%{transform:translateY(0) rotateZ(-2deg)}66%{transform:translateY(.3125em) rotateZ(2deg)}100%{transform:translateY(0) rotateZ(0)}}@keyframes swal2-toast-show{0%{transform:translateY(-.625em) rotateZ(2deg)}33%{transform:translateY(0) rotateZ(-2deg)}66%{transform:translateY(.3125em) rotateZ(2deg)}100%{transform:translateY(0) rotateZ(0)}}@-webkit-keyframes swal2-toast-hide{100%{transform:rotateZ(1deg);opacity:0}}@keyframes swal2-toast-hide{100%{transform:rotateZ(1deg);opacity:0}}@-webkit-keyframes swal2-toast-animate-success-line-tip{0%{top:.5625em;left:.0625em;width:0}54%{top:.125em;left:.125em;width:0}70%{top:.625em;left:-.25em;width:1.625em}84%{top:1.0625em;left:.75em;width:.5em}100%{top:1.125em;left:.1875em;width:.75em}}@keyframes swal2-toast-animate-success-line-tip{0%{top:.5625em;left:.0625em;width:0}54%{top:.125em;left:.125em;width:0}70%{top:.625em;left:-.25em;width:1.625em}84%{top:1.0625em;left:.75em;width:.5em}100%{top:1.125em;left:.1875em;width:.75em}}@-webkit-keyframes swal2-toast-animate-success-line-long{0%{top:1.625em;right:1.375em;width:0}65%{top:1.25em;right:.9375em;width:0}84%{top:.9375em;right:0;width:1.125em}100%{top:.9375em;right:.1875em;width:1.375em}}@keyframes swal2-toast-animate-success-line-long{0%{top:1.625em;right:1.375em;width:0}65%{top:1.25em;right:.9375em;width:0}84%{top:.9375em;right:0;width:1.125em}100%{top:.9375em;right:.1875em;width:1.375em}}@-webkit-keyframes swal2-show{0%{transform:scale(.7)}45%{transform:scale(1.05)}80%{transform:scale(.95)}100%{transform:scale(1)}}@keyframes swal2-show{0%{transform:scale(.7)}45%{transform:scale(1.05)}80%{transform:scale(.95)}100%{transform:scale(1)}}@-webkit-keyframes swal2-hide{0%{transform:scale(1);opacity:1}100%{transform:scale(.5);opacity:0}}@keyframes swal2-hide{0%{transform:scale(1);opacity:1}100%{transform:scale(.5);opacity:0}}@-webkit-keyframes swal2-animate-success-line-tip{0%{top:1.1875em;left:.0625em;width:0}54%{top:1.0625em;left:.125em;width:0}70%{top:2.1875em;left:-.375em;width:3.125em}84%{top:3em;left:1.3125em;width:1.0625em}100%{top:2.8125em;left:.8125em;width:1.5625em}}@keyframes swal2-animate-success-line-tip{0%{top:1.1875em;left:.0625em;width:0}54%{top:1.0625em;left:.125em;width:0}70%{top:2.1875em;left:-.375em;width:3.125em}84%{top:3em;left:1.3125em;width:1.0625em}100%{top:2.8125em;left:.8125em;width:1.5625em}}@-webkit-keyframes swal2-animate-success-line-long{0%{top:3.375em;right:2.875em;width:0}65%{top:3.375em;right:2.875em;width:0}84%{top:2.1875em;right:0;width:3.4375em}100%{top:2.375em;right:.5em;width:2.9375em}}@keyframes swal2-animate-success-line-long{0%{top:3.375em;right:2.875em;width:0}65%{top:3.375em;right:2.875em;width:0}84%{top:2.1875em;right:0;width:3.4375em}100%{top:2.375em;right:.5em;width:2.9375em}}@-webkit-keyframes swal2-rotate-success-circular-line{0%{transform:rotate(-45deg)}5%{transform:rotate(-45deg)}12%{transform:rotate(-405deg)}100%{transform:rotate(-405deg)}}@keyframes swal2-rotate-success-circular-line{0%{transform:rotate(-45deg)}5%{transform:rotate(-45deg)}12%{transform:rotate(-405deg)}100%{transform:rotate(-405deg)}}@-webkit-keyframes swal2-animate-error-x-mark{0%{margin-top:1.625em;transform:scale(.4);opacity:0}50%{margin-top:1.625em;transform:scale(.4);opacity:0}80%{margin-top:-.375em;transform:scale(1.15)}100%{margin-top:0;transform:scale(1);opacity:1}}@keyframes swal2-animate-error-x-mark{0%{margin-top:1.625em;transform:scale(.4);opacity:0}50%{margin-top:1.625em;transform:scale(.4);opacity:0}80%{margin-top:-.375em;transform:scale(1.15)}100%{margin-top:0;transform:scale(1);opacity:1}}@-webkit-keyframes swal2-animate-error-icon{0%{transform:rotateX(100deg);opacity:0}100%{transform:rotateX(0);opacity:1}}@keyframes swal2-animate-error-icon{0%{transform:rotateX(100deg);opacity:0}100%{transform:rotateX(0);opacity:1}}@-webkit-keyframes swal2-rotate-loading{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}@keyframes swal2-rotate-loading{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown){overflow:hidden}body.swal2-height-auto{height:auto!important}body.swal2-no-backdrop .swal2-container{top:auto;right:auto;bottom:auto;left:auto;max-width:calc(100% - .625em * 2);background-color:transparent!important}body.swal2-no-backdrop .swal2-container>.swal2-modal{box-shadow:0 0 10px rgba(0,0,0,.4)}body.swal2-no-backdrop .swal2-container.swal2-top{top:0;left:50%;transform:translateX(-50%)}body.swal2-no-backdrop .swal2-container.swal2-top-left,body.swal2-no-backdrop .swal2-container.swal2-top-start{top:0;left:0}body.swal2-no-backdrop .swal2-container.swal2-top-end,body.swal2-no-backdrop .swal2-container.swal2-top-right{top:0;right:0}body.swal2-no-backdrop .swal2-container.swal2-center{top:50%;left:50%;transform:translate(-50%,-50%)}body.swal2-no-backdrop .swal2-container.swal2-center-left,body.swal2-no-backdrop .swal2-container.swal2-center-start{top:50%;left:0;transform:translateY(-50%)}body.swal2-no-backdrop .swal2-container.swal2-center-end,body.swal2-no-backdrop .swal2-container.swal2-center-right{top:50%;right:0;transform:translateY(-50%)}body.swal2-no-backdrop .swal2-container.swal2-bottom{bottom:0;left:50%;transform:translateX(-50%)}body.swal2-no-backdrop .swal2-container.swal2-bottom-left,body.swal2-no-backdrop .swal2-container.swal2-bottom-start{bottom:0;left:0}body.swal2-no-backdrop .swal2-container.swal2-bottom-end,body.swal2-no-backdrop .swal2-container.swal2-bottom-right{right:0;bottom:0}@media print{body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown){overflow-y:scroll!important}body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown)>[aria-hidden=true]{display:none}body.swal2-shown:not(.swal2-no-backdrop):not(.swal2-toast-shown) .swal2-container{position:static!important}}body.swal2-toast-shown .swal2-container{background-color:transparent}body.swal2-toast-shown .swal2-container.swal2-top{top:0;right:auto;bottom:auto;left:50%;transform:translateX(-50%)}body.swal2-toast-shown .swal2-container.swal2-top-end,body.swal2-toast-shown .swal2-container.swal2-top-right{top:0;right:0;bottom:auto;left:auto}body.swal2-toast-shown .swal2-container.swal2-top-left,body.swal2-toast-shown .swal2-container.swal2-top-start{top:0;right:auto;bottom:auto;left:0}body.swal2-toast-shown .swal2-container.swal2-center-left,body.swal2-toast-shown .swal2-container.swal2-center-start{top:50%;right:auto;bottom:auto;left:0;transform:translateY(-50%)}body.swal2-toast-shown .swal2-container.swal2-center{top:50%;right:auto;bottom:auto;left:50%;transform:translate(-50%,-50%)}body.swal2-toast-shown .swal2-container.swal2-center-end,body.swal2-toast-shown .swal2-container.swal2-center-right{top:50%;right:0;bottom:auto;left:auto;transform:translateY(-50%)}body.swal2-toast-shown .swal2-container.swal2-bottom-left,body.swal2-toast-shown .swal2-container.swal2-bottom-start{top:auto;right:auto;bottom:0;left:0}body.swal2-toast-shown .swal2-container.swal2-bottom{top:auto;right:auto;bottom:0;left:50%;transform:translateX(-50%)}body.swal2-toast-shown .swal2-container.swal2-bottom-end,body.swal2-toast-shown .swal2-container.swal2-bottom-right{top:auto;right:0;bottom:0;left:auto}body.swal2-toast-column .swal2-toast{flex-direction:column;align-items:stretch}body.swal2-toast-column .swal2-toast .swal2-actions{flex:1;align-self:stretch;height:2.2em;margin-top:.3125em}body.swal2-toast-column .swal2-toast .swal2-loading{justify-content:center}body.swal2-toast-column .swal2-toast .swal2-input{height:2em;margin:.3125em auto;font-size:1em}body.swal2-toast-column .swal2-toast .swal2-validation-message{font-size:1em}'
    );

/* jquery.nicescroll v3.7.6 InuYaksa - MIT - https://nicescroll.areaaperta.com */
!(function (e) {
    "function" == typeof define && define.amd ? define(["jquery"], e) : "object" == typeof exports ? (module.exports = e(require("jquery"))) : e(jQuery);
})(function (e) {
    "use strict";
    var o = !1,
        t = !1,
        r = 0,
        i = 2e3,
        s = 0,
        n = e,
        l = document,
        a = window,
        c = n(a),
        d = [],
        u = a.requestAnimationFrame || a.webkitRequestAnimationFrame || a.mozRequestAnimationFrame || !1,
        h = a.cancelAnimationFrame || a.webkitCancelAnimationFrame || a.mozCancelAnimationFrame || !1;
    if (u) a.cancelAnimationFrame || (h = function (e) {});
    else {
        var p = 0;
        (u = function (e, o) {
            var t = new Date().getTime(),
                r = Math.max(0, 16 - (t - p)),
                i = a.setTimeout(function () {
                    e(t + r);
                }, r);
            return (p = t + r), i;
        }),
            (h = function (e) {
                a.clearTimeout(e);
            });
    }
    var m = a.MutationObserver || a.WebKitMutationObserver || !1,
        f =
            Date.now ||
            function () {
                return new Date().getTime();
            },
        g = {
            zindex: "auto",
            cursoropacitymin: 0,
            cursoropacitymax: 1,
            cursorcolor: "#424242",
            cursorwidth: "6px",
            cursorborder: "1px solid #fff",
            cursorborderradius: "5px",
            scrollspeed: 40,
            mousescrollstep: 27,
            touchbehavior: !1,
            emulatetouch: !1,
            hwacceleration: !0,
            usetransition: !0,
            boxzoom: !1,
            dblclickzoom: !0,
            gesturezoom: !0,
            grabcursorenabled: !0,
            autohidemode: !0,
            background: "",
            iframeautoresize: !0,
            cursorminheight: 32,
            preservenativescrolling: !0,
            railoffset: !1,
            railhoffset: !1,
            bouncescroll: !0,
            spacebarenabled: !0,
            railpadding: { top: 0, right: 0, left: 0, bottom: 0 },
            disableoutline: !0,
            horizrailenabled: !0,
            railalign: "right",
            railvalign: "bottom",
            enabletranslate3d: !0,
            enablemousewheel: !0,
            enablekeyboard: !0,
            smoothscroll: !0,
            sensitiverail: !0,
            enablemouselockapi: !0,
            cursorfixedheight: !1,
            directionlockdeadzone: 6,
            hidecursordelay: 400,
            nativeparentscrolling: !0,
            enablescrollonselection: !0,
            overflowx: !0,
            overflowy: !0,
            cursordragspeed: 0.3,
            rtlmode: "auto",
            cursordragontouch: !1,
            oneaxismousemode: "auto",
            scriptpath: (function () {
                var e =
                        l.currentScript ||
                        (function () {
                            var e = l.getElementsByTagName("script");
                            return !!e.length && e[e.length - 1];
                        })(),
                    o = e ? e.src.split("?")[0] : "";
                return o.split("/").length > 0 ? o.split("/").slice(0, -1).join("/") + "/" : "";
            })(),
            preventmultitouchscrolling: !0,
            disablemutationobserver: !1,
            enableobserver: !0,
            scrollbarid: !1,
        },
        v = !1,
        w = function () {
            if (v) return v;
            var e = l.createElement("DIV"),
                o = e.style,
                t = navigator.userAgent,
                r = navigator.platform,
                i = {};
            return (
                (i.haspointerlock = "pointerLockElement" in l || "webkitPointerLockElement" in l || "mozPointerLockElement" in l),
                (i.isopera = "opera" in a),
                (i.isopera12 = i.isopera && "getUserMedia" in navigator),
                (i.isoperamini = "[object OperaMini]" === Object.prototype.toString.call(a.operamini)),
                (i.isie = "all" in l && "attachEvent" in e && !i.isopera),
                (i.isieold = i.isie && !("msInterpolationMode" in o)),
                (i.isie7 = i.isie && !i.isieold && (!("documentMode" in l) || 7 === l.documentMode)),
                (i.isie8 = i.isie && "documentMode" in l && 8 === l.documentMode),
                (i.isie9 = i.isie && "performance" in a && 9 === l.documentMode),
                (i.isie10 = i.isie && "performance" in a && 10 === l.documentMode),
                (i.isie11 = "msRequestFullscreen" in e && l.documentMode >= 11),
                (i.ismsedge = "msCredentials" in a),
                (i.ismozilla = "MozAppearance" in o),
                (i.iswebkit = !i.ismsedge && "WebkitAppearance" in o),
                (i.ischrome = i.iswebkit && "chrome" in a),
                (i.ischrome38 = i.ischrome && "touchAction" in o),
                (i.ischrome22 = !i.ischrome38 && i.ischrome && i.haspointerlock),
                (i.ischrome26 = !i.ischrome38 && i.ischrome && "transition" in o),
                (i.cantouch = "ontouchstart" in l.documentElement || "ontouchstart" in a),
                (i.hasw3ctouch = (a.PointerEvent || !1) && (navigator.maxTouchPoints > 0 || navigator.msMaxTouchPoints > 0)),
                (i.hasmstouch = !i.hasw3ctouch && (a.MSPointerEvent || !1)),
                (i.ismac = /^mac$/i.test(r)),
                (i.isios = i.cantouch && /iphone|ipad|ipod/i.test(r)),
                (i.isios4 = i.isios && !("seal" in Object)),
                (i.isios7 = i.isios && "webkitHidden" in l),
                (i.isios8 = i.isios && "hidden" in l),
                (i.isios10 = i.isios && a.Proxy),
                (i.isandroid = /android/i.test(t)),
                (i.haseventlistener = "addEventListener" in e),
                (i.trstyle = !1),
                (i.hastransform = !1),
                (i.hastranslate3d = !1),
                (i.transitionstyle = !1),
                (i.hastransition = !1),
                (i.transitionend = !1),
                (i.trstyle = "transform"),
                (i.hastransform =
                    "transform" in o ||
                    (function () {
                        for (var e = ["msTransform", "webkitTransform", "MozTransform", "OTransform"], t = 0, r = e.length; t < r; t++)
                            if (void 0 !== o[e[t]]) {
                                i.trstyle = e[t];
                                break;
                            }
                        i.hastransform = !!i.trstyle;
                    })()),
                i.hastransform && ((o[i.trstyle] = "translate3d(1px,2px,3px)"), (i.hastranslate3d = /translate3d/.test(o[i.trstyle]))),
                (i.transitionstyle = "transition"),
                (i.prefixstyle = ""),
                (i.transitionend = "transitionend"),
                (i.hastransition =
                    "transition" in o ||
                    (function () {
                        i.transitionend = !1;
                        for (
                            var e = ["webkitTransition", "msTransition", "MozTransition", "OTransition", "OTransition", "KhtmlTransition"],
                                t = ["-webkit-", "-ms-", "-moz-", "-o-", "-o", "-khtml-"],
                                r = ["webkitTransitionEnd", "msTransitionEnd", "transitionend", "otransitionend", "oTransitionEnd", "KhtmlTransitionEnd"],
                                s = 0,
                                n = e.length;
                            s < n;
                            s++
                        )
                            if (e[s] in o) {
                                (i.transitionstyle = e[s]), (i.prefixstyle = t[s]), (i.transitionend = r[s]);
                                break;
                            }
                        i.ischrome26 && (i.prefixstyle = t[1]), (i.hastransition = i.transitionstyle);
                    })()),
                (i.cursorgrabvalue = (function () {
                    var e = ["grab", "-webkit-grab", "-moz-grab"];
                    ((i.ischrome && !i.ischrome38) || i.isie) && (e = []);
                    for (var t = 0, r = e.length; t < r; t++) {
                        var s = e[t];
                        if (((o.cursor = s), o.cursor == s)) return s;
                    }
                    return "url(https://cdnjs.cloudflare.com/ajax/libs/slider-pro/1.3.0/css/images/openhand.cur),n-resize";
                })()),
                (i.hasmousecapture = "setCapture" in e),
                (i.hasMutationObserver = !1 !== m),
                (e = null),
                (v = i),
                i
            );
        },
        b = function (e, p) {
            function v() {
                var e = T.doc.css(P.trstyle);
                return (
                    !(!e || "matrix" != e.substr(0, 6)) &&
                    e
                        .replace(/^.*\((.*)\)$/g, "$1")
                        .replace(/px/g, "")
                        .split(/, +/)
                );
            }
            function b() {
                var e = T.win;
                if ("zIndex" in e) return e.zIndex();
                for (; e.length > 0; ) {
                    if (9 == e[0].nodeType) return !1;
                    var o = e.css("zIndex");
                    if (!isNaN(o) && 0 !== o) return parseInt(o);
                    e = e.parent();
                }
                return !1;
            }
            function x(e, o, t) {
                var r = e.css(o),
                    i = parseFloat(r);
                if (isNaN(i)) {
                    var s = 3 == (i = I[r] || 0) ? (t ? T.win.outerHeight() - T.win.innerHeight() : T.win.outerWidth() - T.win.innerWidth()) : 1;
                    return T.isie8 && i && (i += 1), s ? i : 0;
                }
                return i;
            }
            function S(e, o, t, r) {
                T._bind(
                    e,
                    o,
                    function (r) {
                        var i = {
                            original: (r = r || a.event),
                            target: r.target || r.srcElement,
                            type: "wheel",
                            deltaMode: "MozMousePixelScroll" == r.type ? 0 : 1,
                            deltaX: 0,
                            deltaZ: 0,
                            preventDefault: function () {
                                return r.preventDefault ? r.preventDefault() : (r.returnValue = !1), !1;
                            },
                            stopImmediatePropagation: function () {
                                r.stopImmediatePropagation ? r.stopImmediatePropagation() : (r.cancelBubble = !0);
                            },
                        };
                        return (
                            "mousewheel" == o
                                ? (r.wheelDeltaX && (i.deltaX = -0.025 * r.wheelDeltaX), r.wheelDeltaY && (i.deltaY = -0.025 * r.wheelDeltaY), !i.deltaY && !i.deltaX && (i.deltaY = -0.025 * r.wheelDelta))
                                : (i.deltaY = r.detail),
                            t.call(e, i)
                        );
                    },
                    r
                );
            }
            function z(e, o, t, r) {
                T.scrollrunning || ((T.newscrolly = T.getScrollTop()), (T.newscrollx = T.getScrollLeft()), (D = f()));
                var i = f() - D;
                if (((D = f()), i > 350 ? (A = 1) : (A += (2 - A) / 10), (e = (e * A) | 0), (o = (o * A) | 0), e)) {
                    if (r)
                        if (e < 0) {
                            if (T.getScrollLeft() >= T.page.maxw) return !0;
                        } else if (T.getScrollLeft() <= 0) return !0;
                    var s = e > 0 ? 1 : -1;
                    X !== s && (T.scrollmom && T.scrollmom.stop(), (T.newscrollx = T.getScrollLeft()), (X = s)), (T.lastdeltax -= e);
                }
                if (o) {
                    if (
                        (function () {
                            var e = T.getScrollTop();
                            if (o < 0) {
                                if (e >= T.page.maxh) return !0;
                            } else if (e <= 0) return !0;
                        })()
                    ) {
                        if (M.nativeparentscrolling && t && !T.ispage && !T.zoomactive) return !0;
                        var n = T.view.h >> 1;
                        T.newscrolly < -n ? ((T.newscrolly = -n), (o = -1)) : T.newscrolly > T.page.maxh + n ? ((T.newscrolly = T.page.maxh + n), (o = 1)) : (o = 0);
                    }
                    var l = o > 0 ? 1 : -1;
                    B !== l && (T.scrollmom && T.scrollmom.stop(), (T.newscrolly = T.getScrollTop()), (B = l)), (T.lastdeltay -= o);
                }
                (o || e) &&
                    T.synched("relativexy", function () {
                        var e = T.lastdeltay + T.newscrolly;
                        T.lastdeltay = 0;
                        var o = T.lastdeltax + T.newscrollx;
                        (T.lastdeltax = 0), T.rail.drag || T.doScrollPos(o, e);
                    });
            }
            function k(e, o, t) {
                var r, i;
                return (
                    !(t || !q) ||
                    (0 === e.deltaMode
                        ? ((r = (-e.deltaX * (M.mousescrollstep / 54)) | 0), (i = (-e.deltaY * (M.mousescrollstep / 54)) | 0))
                        : 1 === e.deltaMode && ((r = ((-e.deltaX * M.mousescrollstep * 50) / 80) | 0), (i = ((-e.deltaY * M.mousescrollstep * 50) / 80) | 0)),
                    o && M.oneaxismousemode && 0 === r && i && ((r = i), (i = 0), t && (r < 0 ? T.getScrollLeft() >= T.page.maxw : T.getScrollLeft() <= 0) && ((i = r), (r = 0))),
                    T.isrtlmode && (r = -r),
                    z(r, i, t, !0) ? void (t && (q = !0)) : ((q = !1), e.stopImmediatePropagation(), e.preventDefault()))
                );
            }
            var T = this;
            (this.version = "3.7.6"), (this.name = "nicescroll"), (this.me = p);
            var E = n("body"),
                M = (this.opt = { doc: E, win: !1 });
            if ((n.extend(M, g), (M.snapbackspeed = 80), e)) for (var L in M) void 0 !== e[L] && (M[L] = e[L]);
            if (
                (M.disablemutationobserver && (m = !1),
                (this.doc = M.doc),
                (this.iddoc = this.doc && this.doc[0] ? this.doc[0].id || "" : ""),
                (this.ispage = /^BODY|HTML/.test(M.win ? M.win[0].nodeName : this.doc[0].nodeName)),
                (this.haswrapper = !1 !== M.win),
                (this.win = M.win || (this.ispage ? c : this.doc)),
                (this.docscroll = this.ispage && !this.haswrapper ? c : this.win),
                (this.body = E),
                (this.viewport = !1),
                (this.isfixed = !1),
                (this.iframe = !1),
                (this.isiframe = "IFRAME" == this.doc[0].nodeName && "IFRAME" == this.win[0].nodeName),
                (this.istextarea = "TEXTAREA" == this.win[0].nodeName),
                (this.forcescreen = !1),
                (this.canshowonmouseevent = "scroll" != M.autohidemode),
                (this.onmousedown = !1),
                (this.onmouseup = !1),
                (this.onmousemove = !1),
                (this.onmousewheel = !1),
                (this.onkeypress = !1),
                (this.ongesturezoom = !1),
                (this.onclick = !1),
                (this.onscrollstart = !1),
                (this.onscrollend = !1),
                (this.onscrollcancel = !1),
                (this.onzoomin = !1),
                (this.onzoomout = !1),
                (this.view = !1),
                (this.page = !1),
                (this.scroll = { x: 0, y: 0 }),
                (this.scrollratio = { x: 0, y: 0 }),
                (this.cursorheight = 20),
                (this.scrollvaluemax = 0),
                "auto" == M.rtlmode)
            ) {
                var C = this.win[0] == a ? this.body : this.win,
                    N = C.css("writing-mode") || C.css("-webkit-writing-mode") || C.css("-ms-writing-mode") || C.css("-moz-writing-mode");
                "horizontal-tb" == N || "lr-tb" == N || "" === N
                    ? ((this.isrtlmode = "rtl" == C.css("direction")), (this.isvertical = !1))
                    : ((this.isrtlmode = "vertical-rl" == N || "tb" == N || "tb-rl" == N || "rl-tb" == N), (this.isvertical = "vertical-rl" == N || "tb" == N || "tb-rl" == N));
            } else (this.isrtlmode = !0 === M.rtlmode), (this.isvertical = !1);
            if (((this.scrollrunning = !1), (this.scrollmom = !1), (this.observer = !1), (this.observerremover = !1), (this.observerbody = !1), !1 !== M.scrollbarid)) this.id = M.scrollbarid;
            else
                do {
                    this.id = "ascrail" + i++;
                } while (l.getElementById(this.id));
            (this.rail = !1),
                (this.cursor = !1),
                (this.cursorfreezed = !1),
                (this.selectiondrag = !1),
                (this.zoom = !1),
                (this.zoomactive = !1),
                (this.hasfocus = !1),
                (this.hasmousefocus = !1),
                (this.railslocked = !1),
                (this.locked = !1),
                (this.hidden = !1),
                (this.cursoractive = !0),
                (this.wheelprevented = !1),
                (this.overflowx = M.overflowx),
                (this.overflowy = M.overflowy),
                (this.nativescrollingarea = !1),
                (this.checkarea = 0),
                (this.events = []),
                (this.saved = {}),
                (this.delaylist = {}),
                (this.synclist = {}),
                (this.lastdeltax = 0),
                (this.lastdeltay = 0),
                (this.detected = w());
            var P = n.extend({}, this.detected);
            (this.canhwscroll = P.hastransform && M.hwacceleration),
                (this.ishwscroll = this.canhwscroll && T.haswrapper),
                this.isrtlmode ? (this.isvertical ? (this.hasreversehr = !(P.iswebkit || P.isie || P.isie11)) : (this.hasreversehr = !(P.iswebkit || (P.isie && !P.isie10 && !P.isie11)))) : (this.hasreversehr = !1),
                (this.istouchcapable = !1),
                P.cantouch || (!P.hasw3ctouch && !P.hasmstouch) ? !P.cantouch || P.isios || P.isandroid || (!P.iswebkit && !P.ismozilla) || (this.istouchcapable = !0) : (this.istouchcapable = !0),
                M.enablemouselockapi || ((P.hasmousecapture = !1), (P.haspointerlock = !1)),
                (this.debounced = function (e, o, t) {
                    T &&
                        (T.delaylist[e] ||
                            !1 ||
                            ((T.delaylist[e] = {
                                h: u(function () {
                                    T.delaylist[e].fn.call(T), (T.delaylist[e] = !1);
                                }, t),
                            }),
                            o.call(T)),
                        (T.delaylist[e].fn = o));
                }),
                (this.synched = function (e, o) {
                    T.synclist[e]
                        ? (T.synclist[e] = o)
                        : ((T.synclist[e] = o),
                          u(function () {
                              T && (T.synclist[e] && T.synclist[e].call(T), (T.synclist[e] = null));
                          }));
                }),
                (this.unsynched = function (e) {
                    T.synclist[e] && (T.synclist[e] = !1);
                }),
                (this.css = function (e, o) {
                    for (var t in o) T.saved.css.push([e, t, e.css(t)]), e.css(t, o[t]);
                }),
                (this.scrollTop = function (e) {
                    return void 0 === e ? T.getScrollTop() : T.setScrollTop(e);
                }),
                (this.scrollLeft = function (e) {
                    return void 0 === e ? T.getScrollLeft() : T.setScrollLeft(e);
                });
            var R = function (e, o, t, r, i, s, n) {
                (this.st = e), (this.ed = o), (this.spd = t), (this.p1 = r || 0), (this.p2 = i || 1), (this.p3 = s || 0), (this.p4 = n || 1), (this.ts = f()), (this.df = o - e);
            };
            if (
                ((R.prototype = {
                    B2: function (e) {
                        return 3 * (1 - e) * (1 - e) * e;
                    },
                    B3: function (e) {
                        return 3 * (1 - e) * e * e;
                    },
                    B4: function (e) {
                        return e * e * e;
                    },
                    getPos: function () {
                        return (f() - this.ts) / this.spd;
                    },
                    getNow: function () {
                        var e = (f() - this.ts) / this.spd,
                            o = this.B2(e) + this.B3(e) + this.B4(e);
                        return e >= 1 ? this.ed : (this.st + this.df * o) | 0;
                    },
                    update: function (e, o) {
                        return (this.st = this.getNow()), (this.ed = e), (this.spd = o), (this.ts = f()), (this.df = this.ed - this.st), this;
                    },
                }),
                this.ishwscroll)
            ) {
                (this.doc.translate = { x: 0, y: 0, tx: "0px", ty: "0px" }),
                    P.hastranslate3d && P.isios && this.doc.css("-webkit-backface-visibility", "hidden"),
                    (this.getScrollTop = function (e) {
                        if (!e) {
                            var o = v();
                            if (o) return 16 == o.length ? -o[13] : -o[5];
                            if (T.timerscroll && T.timerscroll.bz) return T.timerscroll.bz.getNow();
                        }
                        return T.doc.translate.y;
                    }),
                    (this.getScrollLeft = function (e) {
                        if (!e) {
                            var o = v();
                            if (o) return 16 == o.length ? -o[12] : -o[4];
                            if (T.timerscroll && T.timerscroll.bh) return T.timerscroll.bh.getNow();
                        }
                        return T.doc.translate.x;
                    }),
                    (this.notifyScrollEvent = function (e) {
                        var o = l.createEvent("UIEvents");
                        o.initUIEvent("scroll", !1, !1, a, 1), (o.niceevent = !0), e.dispatchEvent(o);
                    });
                var _ = this.isrtlmode ? 1 : -1;
                P.hastranslate3d && M.enabletranslate3d
                    ? ((this.setScrollTop = function (e, o) {
                          (T.doc.translate.y = e), (T.doc.translate.ty = -1 * e + "px"), T.doc.css(P.trstyle, "translate3d(" + T.doc.translate.tx + "," + T.doc.translate.ty + ",0)"), o || T.notifyScrollEvent(T.win[0]);
                      }),
                      (this.setScrollLeft = function (e, o) {
                          (T.doc.translate.x = e), (T.doc.translate.tx = e * _ + "px"), T.doc.css(P.trstyle, "translate3d(" + T.doc.translate.tx + "," + T.doc.translate.ty + ",0)"), o || T.notifyScrollEvent(T.win[0]);
                      }))
                    : ((this.setScrollTop = function (e, o) {
                          (T.doc.translate.y = e), (T.doc.translate.ty = -1 * e + "px"), T.doc.css(P.trstyle, "translate(" + T.doc.translate.tx + "," + T.doc.translate.ty + ")"), o || T.notifyScrollEvent(T.win[0]);
                      }),
                      (this.setScrollLeft = function (e, o) {
                          (T.doc.translate.x = e), (T.doc.translate.tx = e * _ + "px"), T.doc.css(P.trstyle, "translate(" + T.doc.translate.tx + "," + T.doc.translate.ty + ")"), o || T.notifyScrollEvent(T.win[0]);
                      }));
            } else
                (this.getScrollTop = function () {
                    return T.docscroll.scrollTop();
                }),
                    (this.setScrollTop = function (e) {
                        T.docscroll.scrollTop(e);
                    }),
                    (this.getScrollLeft = function () {
                        return T.hasreversehr ? (T.detected.ismozilla ? T.page.maxw - Math.abs(T.docscroll.scrollLeft()) : T.page.maxw - T.docscroll.scrollLeft()) : T.docscroll.scrollLeft();
                    }),
                    (this.setScrollLeft = function (e) {
                        return setTimeout(function () {
                            if (T) return T.hasreversehr && (e = T.detected.ismozilla ? -(T.page.maxw - e) : T.page.maxw - e), T.docscroll.scrollLeft(e);
                        }, 1);
                    });
            (this.getTarget = function (e) {
                return !!e && (e.target ? e.target : !!e.srcElement && e.srcElement);
            }),
                (this.hasParent = function (e, o) {
                    if (!e) return !1;
                    for (var t = e.target || e.srcElement || e || !1; t && t.id != o; ) t = t.parentNode || !1;
                    return !1 !== t;
                });
            var I = { thin: 1, medium: 3, thick: 5 };
            (this.getDocumentScrollOffset = function () {
                return { top: a.pageYOffset || l.documentElement.scrollTop, left: a.pageXOffset || l.documentElement.scrollLeft };
            }),
                (this.getOffset = function () {
                    if (T.isfixed) {
                        var e = T.win.offset(),
                            o = T.getDocumentScrollOffset();
                        return (e.top -= o.top), (e.left -= o.left), e;
                    }
                    var t = T.win.offset();
                    if (!T.viewport) return t;
                    var r = T.viewport.offset();
                    return { top: t.top - r.top, left: t.left - r.left };
                }),
                (this.updateScrollBar = function (e) {
                    var o, t;
                    if (T.ishwscroll) T.rail.css({ height: T.win.innerHeight() - (M.railpadding.top + M.railpadding.bottom) }), T.railh && T.railh.css({ width: T.win.innerWidth() - (M.railpadding.left + M.railpadding.right) });
                    else {
                        var r = T.getOffset();
                        if (
                            ((o = { top: r.top, left: r.left - (M.railpadding.left + M.railpadding.right) }),
                            (o.top += x(T.win, "border-top-width", !0)),
                            (o.left += T.rail.align ? T.win.outerWidth() - x(T.win, "border-right-width") - T.rail.width : x(T.win, "border-left-width")),
                            (t = M.railoffset) && (t.top && (o.top += t.top), t.left && (o.left += t.left)),
                            T.railslocked || T.rail.css({ top: o.top, left: o.left, height: (e ? e.h : T.win.innerHeight()) - (M.railpadding.top + M.railpadding.bottom) }),
                            T.zoom && T.zoom.css({ top: o.top + 1, left: 1 == T.rail.align ? o.left - 20 : o.left + T.rail.width + 4 }),
                            T.railh && !T.railslocked)
                        ) {
                            (o = { top: r.top, left: r.left }), (t = M.railhoffset) && (t.top && (o.top += t.top), t.left && (o.left += t.left));
                            var i = T.railh.align ? o.top + x(T.win, "border-top-width", !0) + T.win.innerHeight() - T.railh.height : o.top + x(T.win, "border-top-width", !0),
                                s = o.left + x(T.win, "border-left-width");
                            T.railh.css({ top: i - (M.railpadding.top + M.railpadding.bottom), left: s, width: T.railh.width });
                        }
                    }
                }),
                (this.doRailClick = function (e, o, t) {
                    var r, i, s, n;
                    T.railslocked ||
                        (T.cancelEvent(e),
                        "pageY" in e || ((e.pageX = e.clientX + l.documentElement.scrollLeft), (e.pageY = e.clientY + l.documentElement.scrollTop)),
                        o
                            ? ((r = t ? T.doScrollLeft : T.doScrollTop),
                              (s = t ? (e.pageX - T.railh.offset().left - T.cursorwidth / 2) * T.scrollratio.x : (e.pageY - T.rail.offset().top - T.cursorheight / 2) * T.scrollratio.y),
                              T.unsynched("relativexy"),
                              r(0 | s))
                            : ((r = t ? T.doScrollLeftBy : T.doScrollBy), (s = t ? T.scroll.x : T.scroll.y), (n = t ? e.pageX - T.railh.offset().left : e.pageY - T.rail.offset().top), (i = t ? T.view.w : T.view.h), r(s >= n ? i : -i)));
                }),
                (T.newscrolly = T.newscrollx = 0),
                (T.hasanimationframe = "requestAnimationFrame" in a),
                (T.hascancelanimationframe = "cancelAnimationFrame" in a),
                (T.hasborderbox = !1),
                (this.init = function () {
                    if (((T.saved.css = []), P.isoperamini)) return !0;
                    if (P.isandroid && !("hidden" in l)) return !0;
                    (M.emulatetouch = M.emulatetouch || M.touchbehavior), (T.hasborderbox = a.getComputedStyle && "border-box" === a.getComputedStyle(l.body)["box-sizing"]);
                    var e = { "overflow-y": "hidden" };
                    if (
                        ((P.isie11 || P.isie10) && (e["-ms-overflow-style"] = "none"),
                        T.ishwscroll && (this.doc.css(P.transitionstyle, P.prefixstyle + "transform 0ms ease-out"), P.transitionend && T.bind(T.doc, P.transitionend, T.onScrollTransitionEnd, !1)),
                        (T.zindex = "auto"),
                        T.ispage || "auto" != M.zindex ? (T.zindex = M.zindex) : (T.zindex = b() || "auto"),
                        !T.ispage && "auto" != T.zindex && T.zindex > s && (s = T.zindex),
                        T.isie && 0 === T.zindex && "auto" == M.zindex && (T.zindex = "auto"),
                        !T.ispage || !P.isieold)
                    ) {
                        var i = T.docscroll;
                        T.ispage && (i = T.haswrapper ? T.win : T.doc), T.css(i, e), T.ispage && (P.isie11 || P.isie) && T.css(n("html"), e), !P.isios || T.ispage || T.haswrapper || T.css(E, { "-webkit-overflow-scrolling": "touch" });
                        var d = n(l.createElement("div"));
                        d.css({
                            position: "relative",
                            top: 0,
                            float: "right",
                            width: M.cursorwidth,
                            height: 0,
                            "background-color": M.cursorcolor,
                            border: M.cursorborder,
                            "background-clip": "padding-box",
                            "-webkit-border-radius": M.cursorborderradius,
                            "-moz-border-radius": M.cursorborderradius,
                            "border-radius": M.cursorborderradius,
                        }),
                            d.addClass("nicescroll-cursors"),
                            (T.cursor = d);
                        var u = n(l.createElement("div"));
                        u.attr("id", T.id), u.addClass("nicescroll-rails nicescroll-rails-vr");
                        var h,
                            p,
                            f = ["left", "right", "top", "bottom"];
                        for (var g in f) (p = f[g]), (h = M.railpadding[p] || 0) && u.css("padding-" + p, h + "px");
                        u.append(d),
                            (u.width = Math.max(parseFloat(M.cursorwidth), d.outerWidth())),
                            u.css({ width: u.width + "px", zIndex: T.zindex, background: M.background, cursor: "default" }),
                            (u.visibility = !0),
                            (u.scrollable = !0),
                            (u.align = "left" == M.railalign ? 0 : 1),
                            (T.rail = u),
                            (T.rail.drag = !1);
                        var v = !1;
                        !M.boxzoom ||
                            T.ispage ||
                            P.isieold ||
                            ((v = l.createElement("div")),
                            T.bind(v, "click", T.doZoom),
                            T.bind(v, "mouseenter", function () {
                                T.zoom.css("opacity", M.cursoropacitymax);
                            }),
                            T.bind(v, "mouseleave", function () {
                                T.zoom.css("opacity", M.cursoropacitymin);
                            }),
                            (T.zoom = n(v)),
                            T.zoom.css({ cursor: "pointer", zIndex: T.zindex, backgroundImage: "url(" + M.scriptpath + "zoomico.png)", height: 18, width: 18, backgroundPosition: "0 0" }),
                            M.dblclickzoom && T.bind(T.win, "dblclick", T.doZoom),
                            P.cantouch &&
                                M.gesturezoom &&
                                ((T.ongesturezoom = function (e) {
                                    return e.scale > 1.5 && T.doZoomIn(e), e.scale < 0.8 && T.doZoomOut(e), T.cancelEvent(e);
                                }),
                                T.bind(T.win, "gestureend", T.ongesturezoom))),
                            (T.railh = !1);
                        var w;
                        if (
                            (M.horizrailenabled &&
                                (T.css(i, { overflowX: "hidden" }),
                                (d = n(l.createElement("div"))).css({
                                    position: "absolute",
                                    top: 0,
                                    height: M.cursorwidth,
                                    width: 0,
                                    backgroundColor: M.cursorcolor,
                                    border: M.cursorborder,
                                    backgroundClip: "padding-box",
                                    "-webkit-border-radius": M.cursorborderradius,
                                    "-moz-border-radius": M.cursorborderradius,
                                    "border-radius": M.cursorborderradius,
                                }),
                                P.isieold && d.css("overflow", "hidden"),
                                d.addClass("nicescroll-cursors"),
                                (T.cursorh = d),
                                (w = n(l.createElement("div"))).attr("id", T.id + "-hr"),
                                w.addClass("nicescroll-rails nicescroll-rails-hr"),
                                (w.height = Math.max(parseFloat(M.cursorwidth), d.outerHeight())),
                                w.css({ height: w.height + "px", zIndex: T.zindex, background: M.background }),
                                w.append(d),
                                (w.visibility = !0),
                                (w.scrollable = !0),
                                (w.align = "top" == M.railvalign ? 0 : 1),
                                (T.railh = w),
                                (T.railh.drag = !1)),
                            T.ispage)
                        )
                            u.css({ position: "fixed", top: 0, height: "100%" }),
                                u.css(u.align ? { right: 0 } : { left: 0 }),
                                T.body.append(u),
                                T.railh && (w.css({ position: "fixed", left: 0, width: "100%" }), w.css(w.align ? { bottom: 0 } : { top: 0 }), T.body.append(w));
                        else {
                            if (T.ishwscroll) {
                                "static" == T.win.css("position") && T.css(T.win, { position: "relative" });
                                var x = "HTML" == T.win[0].nodeName ? T.body : T.win;
                                n(x).scrollTop(0).scrollLeft(0),
                                    T.zoom && (T.zoom.css({ position: "absolute", top: 1, right: 0, "margin-right": u.width + 4 }), x.append(T.zoom)),
                                    u.css({ position: "absolute", top: 0 }),
                                    u.css(u.align ? { right: 0 } : { left: 0 }),
                                    x.append(u),
                                    w && (w.css({ position: "absolute", left: 0, bottom: 0 }), w.css(w.align ? { bottom: 0 } : { top: 0 }), x.append(w));
                            } else {
                                T.isfixed = "fixed" == T.win.css("position");
                                var S = T.isfixed ? "fixed" : "absolute";
                                T.isfixed || (T.viewport = T.getViewport(T.win[0])),
                                    T.viewport && ((T.body = T.viewport), /fixed|absolute/.test(T.viewport.css("position")) || T.css(T.viewport, { position: "relative" })),
                                    u.css({ position: S }),
                                    T.zoom && T.zoom.css({ position: S }),
                                    T.updateScrollBar(),
                                    T.body.append(u),
                                    T.zoom && T.body.append(T.zoom),
                                    T.railh && (w.css({ position: S }), T.body.append(w));
                            }
                            P.isios && T.css(T.win, { "-webkit-tap-highlight-color": "rgba(0,0,0,0)", "-webkit-touch-callout": "none" }),
                                M.disableoutline && (P.isie && T.win.attr("hideFocus", "true"), P.iswebkit && T.win.css("outline", "none"));
                        }
                        if (
                            (!1 === M.autohidemode
                                ? ((T.autohidedom = !1), T.rail.css({ opacity: M.cursoropacitymax }), T.railh && T.railh.css({ opacity: M.cursoropacitymax }))
                                : !0 === M.autohidemode || "leave" === M.autohidemode
                                ? ((T.autohidedom = n().add(T.rail)),
                                  P.isie8 && (T.autohidedom = T.autohidedom.add(T.cursor)),
                                  T.railh && (T.autohidedom = T.autohidedom.add(T.railh)),
                                  T.railh && P.isie8 && (T.autohidedom = T.autohidedom.add(T.cursorh)))
                                : "scroll" == M.autohidemode
                                ? ((T.autohidedom = n().add(T.rail)), T.railh && (T.autohidedom = T.autohidedom.add(T.railh)))
                                : "cursor" == M.autohidemode
                                ? ((T.autohidedom = n().add(T.cursor)), T.railh && (T.autohidedom = T.autohidedom.add(T.cursorh)))
                                : "hidden" == M.autohidemode && ((T.autohidedom = !1), T.hide(), (T.railslocked = !1)),
                            P.cantouch || T.istouchcapable || M.emulatetouch || P.hasmstouch)
                        ) {
                            T.scrollmom = new y(T);
                            (T.ontouchstart = function (e) {
                                if (T.locked) return !1;
                                if (e.pointerType && ("mouse" === e.pointerType || e.pointerType === e.MSPOINTER_TYPE_MOUSE)) return !1;
                                if (((T.hasmoving = !1), T.scrollmom.timer && (T.triggerScrollEnd(), T.scrollmom.stop()), !T.railslocked)) {
                                    var o = T.getTarget(e);
                                    if (o && /INPUT/i.test(o.nodeName) && /range/i.test(o.type)) return T.stopPropagation(e);
                                    var t = "mousedown" === e.type;
                                    if ((!("clientX" in e) && "changedTouches" in e && ((e.clientX = e.changedTouches[0].clientX), (e.clientY = e.changedTouches[0].clientY)), T.forcescreen)) {
                                        var r = e;
                                        ((e = { original: e.original ? e.original : e }).clientX = r.screenX), (e.clientY = r.screenY);
                                    }
                                    if (((T.rail.drag = { x: e.clientX, y: e.clientY, sx: T.scroll.x, sy: T.scroll.y, st: T.getScrollTop(), sl: T.getScrollLeft(), pt: 2, dl: !1, tg: o }), T.ispage || !M.directionlockdeadzone))
                                        T.rail.drag.dl = "f";
                                    else {
                                        var i = { w: c.width(), h: c.height() },
                                            s = T.getContentSize(),
                                            l = s.h - i.h,
                                            a = s.w - i.w;
                                        T.rail.scrollable && !T.railh.scrollable ? (T.rail.drag.ck = l > 0 && "v") : !T.rail.scrollable && T.railh.scrollable ? (T.rail.drag.ck = a > 0 && "h") : (T.rail.drag.ck = !1);
                                    }
                                    if (M.emulatetouch && T.isiframe && P.isie) {
                                        var d = T.win.position();
                                        (T.rail.drag.x += d.left), (T.rail.drag.y += d.top);
                                    }
                                    if (((T.hasmoving = !1), (T.lastmouseup = !1), T.scrollmom.reset(e.clientX, e.clientY), o && t)) {
                                        if (!/INPUT|SELECT|BUTTON|TEXTAREA/i.test(o.nodeName))
                                            return (
                                                P.hasmousecapture && o.setCapture(),
                                                M.emulatetouch
                                                    ? (o.onclick &&
                                                          !o._onclick &&
                                                          ((o._onclick = o.onclick),
                                                          (o.onclick = function (e) {
                                                              if (T.hasmoving) return !1;
                                                              o._onclick.call(this, e);
                                                          })),
                                                      T.cancelEvent(e))
                                                    : T.stopPropagation(e)
                                            );
                                        /SUBMIT|CANCEL|BUTTON/i.test(n(o).attr("type")) && (T.preventclick = { tg: o, click: !1 });
                                    }
                                }
                            }),
                                (T.ontouchend = function (e) {
                                    if (!T.rail.drag) return !0;
                                    if (2 == T.rail.drag.pt) {
                                        if (e.pointerType && ("mouse" === e.pointerType || e.pointerType === e.MSPOINTER_TYPE_MOUSE)) return !1;
                                        T.rail.drag = !1;
                                        var o = "mouseup" === e.type;
                                        if (T.hasmoving && (T.scrollmom.doMomentum(), (T.lastmouseup = !0), T.hideCursor(), P.hasmousecapture && l.releaseCapture(), o)) return T.cancelEvent(e);
                                    } else if (1 == T.rail.drag.pt) return T.onmouseup(e);
                                });
                            var z = M.emulatetouch && T.isiframe && !P.hasmousecapture,
                                k = (0.3 * M.directionlockdeadzone) | 0;
                            (T.ontouchmove = function (e, o) {
                                if (!T.rail.drag) return !0;
                                if (e.targetTouches && M.preventmultitouchscrolling && e.targetTouches.length > 1) return !0;
                                if (e.pointerType && ("mouse" === e.pointerType || e.pointerType === e.MSPOINTER_TYPE_MOUSE)) return !0;
                                if (2 == T.rail.drag.pt) {
                                    "changedTouches" in e && ((e.clientX = e.changedTouches[0].clientX), (e.clientY = e.changedTouches[0].clientY));
                                    var t, r;
                                    if (((r = t = 0), z && !o)) {
                                        var i = T.win.position();
                                        (r = -i.left), (t = -i.top);
                                    }
                                    var s = e.clientY + t,
                                        n = s - T.rail.drag.y,
                                        a = e.clientX + r,
                                        c = a - T.rail.drag.x,
                                        d = T.rail.drag.st - n;
                                    if (T.ishwscroll && M.bouncescroll) d < 0 ? (d = Math.round(d / 2)) : d > T.page.maxh && (d = T.page.maxh + Math.round((d - T.page.maxh) / 2));
                                    else if ((d < 0 ? ((d = 0), (s = 0)) : d > T.page.maxh && ((d = T.page.maxh), (s = 0)), 0 === s && !T.hasmoving)) return T.ispage || (T.rail.drag = !1), !0;
                                    var u = T.getScrollLeft();
                                    if (
                                        (T.railh &&
                                            T.railh.scrollable &&
                                            ((u = T.isrtlmode ? c - T.rail.drag.sl : T.rail.drag.sl - c),
                                            T.ishwscroll && M.bouncescroll
                                                ? u < 0
                                                    ? (u = Math.round(u / 2))
                                                    : u > T.page.maxw && (u = T.page.maxw + Math.round((u - T.page.maxw) / 2))
                                                : (u < 0 && ((u = 0), (a = 0)), u > T.page.maxw && ((u = T.page.maxw), (a = 0)))),
                                        !T.hasmoving)
                                    ) {
                                        if (T.rail.drag.y === e.clientY && T.rail.drag.x === e.clientX) return T.cancelEvent(e);
                                        var h = Math.abs(n),
                                            p = Math.abs(c),
                                            m = M.directionlockdeadzone;
                                        if (
                                            (T.rail.drag.ck
                                                ? "v" == T.rail.drag.ck
                                                    ? p > m && h <= k
                                                        ? (T.rail.drag = !1)
                                                        : h > m && (T.rail.drag.dl = "v")
                                                    : "h" == T.rail.drag.ck && (h > m && p <= k ? (T.rail.drag = !1) : p > m && (T.rail.drag.dl = "h"))
                                                : h > m && p > m
                                                ? (T.rail.drag.dl = "f")
                                                : h > m
                                                ? (T.rail.drag.dl = p > k ? "f" : "v")
                                                : p > m && (T.rail.drag.dl = h > k ? "f" : "h"),
                                            !T.rail.drag.dl)
                                        )
                                            return T.cancelEvent(e);
                                        T.triggerScrollStart(e.clientX, e.clientY, 0, 0, 0), (T.hasmoving = !0);
                                    }
                                    return (
                                        T.preventclick && !T.preventclick.click && ((T.preventclick.click = T.preventclick.tg.onclick || !1), (T.preventclick.tg.onclick = T.onpreventclick)),
                                        T.rail.drag.dl && ("v" == T.rail.drag.dl ? (u = T.rail.drag.sl) : "h" == T.rail.drag.dl && (d = T.rail.drag.st)),
                                        T.synched("touchmove", function () {
                                            T.rail.drag &&
                                                2 == T.rail.drag.pt &&
                                                (T.prepareTransition && T.resetTransition(),
                                                T.rail.scrollable && T.setScrollTop(d),
                                                T.scrollmom.update(a, s),
                                                T.railh && T.railh.scrollable ? (T.setScrollLeft(u), T.showCursor(d, u)) : T.showCursor(d),
                                                P.isie10 && l.selection.clear());
                                        }),
                                        T.cancelEvent(e)
                                    );
                                }
                                return 1 == T.rail.drag.pt ? T.onmousemove(e) : void 0;
                            }),
                                (T.ontouchstartCursor = function (e, o) {
                                    if (!T.rail.drag || 3 == T.rail.drag.pt) {
                                        if (T.locked) return T.cancelEvent(e);
                                        T.cancelScroll(), (T.rail.drag = { x: e.touches[0].clientX, y: e.touches[0].clientY, sx: T.scroll.x, sy: T.scroll.y, pt: 3, hr: !!o });
                                        var t = T.getTarget(e);
                                        return (
                                            !T.ispage && P.hasmousecapture && t.setCapture(),
                                            T.isiframe && !P.hasmousecapture && ((T.saved.csspointerevents = T.doc.css("pointer-events")), T.css(T.doc, { "pointer-events": "none" })),
                                            T.cancelEvent(e)
                                        );
                                    }
                                }),
                                (T.ontouchendCursor = function (e) {
                                    if (T.rail.drag) {
                                        if ((P.hasmousecapture && l.releaseCapture(), T.isiframe && !P.hasmousecapture && T.doc.css("pointer-events", T.saved.csspointerevents), 3 != T.rail.drag.pt)) return;
                                        return (T.rail.drag = !1), T.cancelEvent(e);
                                    }
                                }),
                                (T.ontouchmoveCursor = function (e) {
                                    if (T.rail.drag) {
                                        if (3 != T.rail.drag.pt) return;
                                        if (((T.cursorfreezed = !0), T.rail.drag.hr)) {
                                            (T.scroll.x = T.rail.drag.sx + (e.touches[0].clientX - T.rail.drag.x)), T.scroll.x < 0 && (T.scroll.x = 0);
                                            var o = T.scrollvaluemaxw;
                                            T.scroll.x > o && (T.scroll.x = o);
                                        } else {
                                            (T.scroll.y = T.rail.drag.sy + (e.touches[0].clientY - T.rail.drag.y)), T.scroll.y < 0 && (T.scroll.y = 0);
                                            var t = T.scrollvaluemax;
                                            T.scroll.y > t && (T.scroll.y = t);
                                        }
                                        return (
                                            T.synched("touchmove", function () {
                                                T.rail.drag &&
                                                    3 == T.rail.drag.pt &&
                                                    (T.showCursor(), T.rail.drag.hr ? T.doScrollLeft(Math.round(T.scroll.x * T.scrollratio.x), M.cursordragspeed) : T.doScrollTop(Math.round(T.scroll.y * T.scrollratio.y), M.cursordragspeed));
                                            }),
                                            T.cancelEvent(e)
                                        );
                                    }
                                });
                        }
                        if (
                            ((T.onmousedown = function (e, o) {
                                if (!T.rail.drag || 1 == T.rail.drag.pt) {
                                    if (T.railslocked) return T.cancelEvent(e);
                                    T.cancelScroll(), (T.rail.drag = { x: e.clientX, y: e.clientY, sx: T.scroll.x, sy: T.scroll.y, pt: 1, hr: o || !1 });
                                    var t = T.getTarget(e);
                                    return (
                                        P.hasmousecapture && t.setCapture(),
                                        T.isiframe && !P.hasmousecapture && ((T.saved.csspointerevents = T.doc.css("pointer-events")), T.css(T.doc, { "pointer-events": "none" })),
                                        (T.hasmoving = !1),
                                        T.cancelEvent(e)
                                    );
                                }
                            }),
                            (T.onmouseup = function (e) {
                                if (T.rail.drag)
                                    return (
                                        1 != T.rail.drag.pt ||
                                        (P.hasmousecapture && l.releaseCapture(),
                                        T.isiframe && !P.hasmousecapture && T.doc.css("pointer-events", T.saved.csspointerevents),
                                        (T.rail.drag = !1),
                                        (T.cursorfreezed = !1),
                                        T.hasmoving && T.triggerScrollEnd(),
                                        T.cancelEvent(e))
                                    );
                            }),
                            (T.onmousemove = function (e) {
                                if (T.rail.drag) {
                                    if (1 !== T.rail.drag.pt) return;
                                    if (P.ischrome && 0 === e.which) return T.onmouseup(e);
                                    if (((T.cursorfreezed = !0), T.hasmoving || T.triggerScrollStart(e.clientX, e.clientY, 0, 0, 0), (T.hasmoving = !0), T.rail.drag.hr)) {
                                        (T.scroll.x = T.rail.drag.sx + (e.clientX - T.rail.drag.x)), T.scroll.x < 0 && (T.scroll.x = 0);
                                        var o = T.scrollvaluemaxw;
                                        T.scroll.x > o && (T.scroll.x = o);
                                    } else {
                                        (T.scroll.y = T.rail.drag.sy + (e.clientY - T.rail.drag.y)), T.scroll.y < 0 && (T.scroll.y = 0);
                                        var t = T.scrollvaluemax;
                                        T.scroll.y > t && (T.scroll.y = t);
                                    }
                                    return (
                                        T.synched("mousemove", function () {
                                            T.cursorfreezed && (T.showCursor(), T.rail.drag.hr ? T.scrollLeft(Math.round(T.scroll.x * T.scrollratio.x)) : T.scrollTop(Math.round(T.scroll.y * T.scrollratio.y)));
                                        }),
                                        T.cancelEvent(e)
                                    );
                                }
                                T.checkarea = 0;
                            }),
                            P.cantouch || M.emulatetouch)
                        )
                            (T.onpreventclick = function (e) {
                                if (T.preventclick) return (T.preventclick.tg.onclick = T.preventclick.click), (T.preventclick = !1), T.cancelEvent(e);
                            }),
                                (T.onclick =
                                    !P.isios &&
                                    function (e) {
                                        return !T.lastmouseup || ((T.lastmouseup = !1), T.cancelEvent(e));
                                    }),
                                M.grabcursorenabled && P.cursorgrabvalue && (T.css(T.ispage ? T.doc : T.win, { cursor: P.cursorgrabvalue }), T.css(T.rail, { cursor: P.cursorgrabvalue }));
                        else {
                            var L = function (e) {
                                if (T.selectiondrag) {
                                    if (e) {
                                        var o = T.win.outerHeight(),
                                            t = e.pageY - T.selectiondrag.top;
                                        t > 0 && t < o && (t = 0), t >= o && (t -= o), (T.selectiondrag.df = t);
                                    }
                                    if (0 !== T.selectiondrag.df) {
                                        var r = ((-2 * T.selectiondrag.df) / 6) | 0;
                                        T.doScrollBy(r),
                                            T.debounced(
                                                "doselectionscroll",
                                                function () {
                                                    L();
                                                },
                                                50
                                            );
                                    }
                                }
                            };
                            (T.hasTextSelected =
                                "getSelection" in l
                                    ? function () {
                                          return l.getSelection().rangeCount > 0;
                                      }
                                    : "selection" in l
                                    ? function () {
                                          return "None" != l.selection.type;
                                      }
                                    : function () {
                                          return !1;
                                      }),
                                (T.onselectionstart = function (e) {
                                    T.ispage || (T.selectiondrag = T.win.offset());
                                }),
                                (T.onselectionend = function (e) {
                                    T.selectiondrag = !1;
                                }),
                                (T.onselectiondrag = function (e) {
                                    T.selectiondrag &&
                                        T.hasTextSelected() &&
                                        T.debounced(
                                            "selectionscroll",
                                            function () {
                                                L(e);
                                            },
                                            250
                                        );
                                });
                        }
                        if (
                            (P.hasw3ctouch
                                ? (T.css(T.ispage ? n("html") : T.win, { "touch-action": "none" }),
                                  T.css(T.rail, { "touch-action": "none" }),
                                  T.css(T.cursor, { "touch-action": "none" }),
                                  T.bind(T.win, "pointerdown", T.ontouchstart),
                                  T.bind(l, "pointerup", T.ontouchend),
                                  T.delegate(l, "pointermove", T.ontouchmove))
                                : P.hasmstouch
                                ? (T.css(T.ispage ? n("html") : T.win, { "-ms-touch-action": "none" }),
                                  T.css(T.rail, { "-ms-touch-action": "none" }),
                                  T.css(T.cursor, { "-ms-touch-action": "none" }),
                                  T.bind(T.win, "MSPointerDown", T.ontouchstart),
                                  T.bind(l, "MSPointerUp", T.ontouchend),
                                  T.delegate(l, "MSPointerMove", T.ontouchmove),
                                  T.bind(T.cursor, "MSGestureHold", function (e) {
                                      e.preventDefault();
                                  }),
                                  T.bind(T.cursor, "contextmenu", function (e) {
                                      e.preventDefault();
                                  }))
                                : P.cantouch &&
                                  (T.bind(T.win, "touchstart", T.ontouchstart, !1, !0), T.bind(l, "touchend", T.ontouchend, !1, !0), T.bind(l, "touchcancel", T.ontouchend, !1, !0), T.delegate(l, "touchmove", T.ontouchmove, !1, !0)),
                            M.emulatetouch && (T.bind(T.win, "mousedown", T.ontouchstart, !1, !0), T.bind(l, "mouseup", T.ontouchend, !1, !0), T.bind(l, "mousemove", T.ontouchmove, !1, !0)),
                            (M.cursordragontouch || (!P.cantouch && !M.emulatetouch)) &&
                                (T.rail.css({ cursor: "default" }),
                                T.railh && T.railh.css({ cursor: "default" }),
                                T.jqbind(T.rail, "mouseenter", function () {
                                    if (!T.ispage && !T.win.is(":visible")) return !1;
                                    T.canshowonmouseevent && T.showCursor(), (T.rail.active = !0);
                                }),
                                T.jqbind(T.rail, "mouseleave", function () {
                                    (T.rail.active = !1), T.rail.drag || T.hideCursor();
                                }),
                                M.sensitiverail &&
                                    (T.bind(T.rail, "click", function (e) {
                                        T.doRailClick(e, !1, !1);
                                    }),
                                    T.bind(T.rail, "dblclick", function (e) {
                                        T.doRailClick(e, !0, !1);
                                    }),
                                    T.bind(T.cursor, "click", function (e) {
                                        T.cancelEvent(e);
                                    }),
                                    T.bind(T.cursor, "dblclick", function (e) {
                                        T.cancelEvent(e);
                                    })),
                                T.railh &&
                                    (T.jqbind(T.railh, "mouseenter", function () {
                                        if (!T.ispage && !T.win.is(":visible")) return !1;
                                        T.canshowonmouseevent && T.showCursor(), (T.rail.active = !0);
                                    }),
                                    T.jqbind(T.railh, "mouseleave", function () {
                                        (T.rail.active = !1), T.rail.drag || T.hideCursor();
                                    }),
                                    M.sensitiverail &&
                                        (T.bind(T.railh, "click", function (e) {
                                            T.doRailClick(e, !1, !0);
                                        }),
                                        T.bind(T.railh, "dblclick", function (e) {
                                            T.doRailClick(e, !0, !0);
                                        }),
                                        T.bind(T.cursorh, "click", function (e) {
                                            T.cancelEvent(e);
                                        }),
                                        T.bind(T.cursorh, "dblclick", function (e) {
                                            T.cancelEvent(e);
                                        })))),
                            M.cursordragontouch &&
                                (this.istouchcapable || P.cantouch) &&
                                (T.bind(T.cursor, "touchstart", T.ontouchstartCursor),
                                T.bind(T.cursor, "touchmove", T.ontouchmoveCursor),
                                T.bind(T.cursor, "touchend", T.ontouchendCursor),
                                T.cursorh &&
                                    T.bind(T.cursorh, "touchstart", function (e) {
                                        T.ontouchstartCursor(e, !0);
                                    }),
                                T.cursorh && T.bind(T.cursorh, "touchmove", T.ontouchmoveCursor),
                                T.cursorh && T.bind(T.cursorh, "touchend", T.ontouchendCursor)),
                            M.emulatetouch || P.isandroid || P.isios
                                ? (T.bind(P.hasmousecapture ? T.win : l, "mouseup", T.ontouchend),
                                  T.onclick && T.bind(l, "click", T.onclick),
                                  M.cursordragontouch
                                      ? (T.bind(T.cursor, "mousedown", T.onmousedown),
                                        T.bind(T.cursor, "mouseup", T.onmouseup),
                                        T.cursorh &&
                                            T.bind(T.cursorh, "mousedown", function (e) {
                                                T.onmousedown(e, !0);
                                            }),
                                        T.cursorh && T.bind(T.cursorh, "mouseup", T.onmouseup))
                                      : (T.bind(T.rail, "mousedown", function (e) {
                                            e.preventDefault();
                                        }),
                                        T.railh &&
                                            T.bind(T.railh, "mousedown", function (e) {
                                                e.preventDefault();
                                            })))
                                : (T.bind(P.hasmousecapture ? T.win : l, "mouseup", T.onmouseup),
                                  T.bind(l, "mousemove", T.onmousemove),
                                  T.onclick && T.bind(l, "click", T.onclick),
                                  T.bind(T.cursor, "mousedown", T.onmousedown),
                                  T.bind(T.cursor, "mouseup", T.onmouseup),
                                  T.railh &&
                                      (T.bind(T.cursorh, "mousedown", function (e) {
                                          T.onmousedown(e, !0);
                                      }),
                                      T.bind(T.cursorh, "mouseup", T.onmouseup)),
                                  !T.ispage &&
                                      M.enablescrollonselection &&
                                      (T.bind(T.win[0], "mousedown", T.onselectionstart),
                                      T.bind(l, "mouseup", T.onselectionend),
                                      T.bind(T.cursor, "mouseup", T.onselectionend),
                                      T.cursorh && T.bind(T.cursorh, "mouseup", T.onselectionend),
                                      T.bind(l, "mousemove", T.onselectiondrag)),
                                  T.zoom &&
                                      (T.jqbind(T.zoom, "mouseenter", function () {
                                          T.canshowonmouseevent && T.showCursor(), (T.rail.active = !0);
                                      }),
                                      T.jqbind(T.zoom, "mouseleave", function () {
                                          (T.rail.active = !1), T.rail.drag || T.hideCursor();
                                      }))),
                            M.enablemousewheel && (T.isiframe || T.mousewheel(P.isie && T.ispage ? l : T.win, T.onmousewheel), T.mousewheel(T.rail, T.onmousewheel), T.railh && T.mousewheel(T.railh, T.onmousewheelhr)),
                            T.ispage ||
                                P.cantouch ||
                                /HTML|^BODY/.test(T.win[0].nodeName) ||
                                (T.win.attr("tabindex") || T.win.attr({ tabindex: ++r }),
                                T.bind(T.win, "focus", function (e) {
                                    (o = T.getTarget(e).id || T.getTarget(e) || !1), (T.hasfocus = !0), T.canshowonmouseevent && T.noticeCursor();
                                }),
                                T.bind(T.win, "blur", function (e) {
                                    (o = !1), (T.hasfocus = !1);
                                }),
                                T.bind(T.win, "mouseenter", function (e) {
                                    (t = T.getTarget(e).id || T.getTarget(e) || !1), (T.hasmousefocus = !0), T.canshowonmouseevent && T.noticeCursor();
                                }),
                                T.bind(T.win, "mouseleave", function (e) {
                                    (t = !1), (T.hasmousefocus = !1), T.rail.drag || T.hideCursor();
                                })),
                            (T.onkeypress = function (e) {
                                if (T.railslocked && 0 === T.page.maxh) return !0;
                                e = e || a.event;
                                var r = T.getTarget(e);
                                if (r && /INPUT|TEXTAREA|SELECT|OPTION/.test(r.nodeName) && (!(r.getAttribute("type") || r.type || !1) || !/submit|button|cancel/i.tp)) return !0;
                                if (n(r).attr("contenteditable")) return !0;
                                if (T.hasfocus || (T.hasmousefocus && !o) || (T.ispage && !o && !t)) {
                                    var i = e.keyCode;
                                    if (T.railslocked && 27 != i) return T.cancelEvent(e);
                                    var s = e.ctrlKey || !1,
                                        l = e.shiftKey || !1,
                                        c = !1;
                                    switch (i) {
                                        case 38:
                                        case 63233:
                                            T.doScrollBy(72), (c = !0);
                                            break;
                                        case 40:
                                        case 63235:
                                            T.doScrollBy(-72), (c = !0);
                                            break;
                                        case 37:
                                        case 63232:
                                            T.railh && (s ? T.doScrollLeft(0) : T.doScrollLeftBy(72), (c = !0));
                                            break;
                                        case 39:
                                        case 63234:
                                            T.railh && (s ? T.doScrollLeft(T.page.maxw) : T.doScrollLeftBy(-72), (c = !0));
                                            break;
                                        case 33:
                                        case 63276:
                                            T.doScrollBy(T.view.h), (c = !0);
                                            break;
                                        case 34:
                                        case 63277:
                                            T.doScrollBy(-T.view.h), (c = !0);
                                            break;
                                        case 36:
                                        case 63273:
                                            T.railh && s ? T.doScrollPos(0, 0) : T.doScrollTo(0), (c = !0);
                                            break;
                                        case 35:
                                        case 63275:
                                            T.railh && s ? T.doScrollPos(T.page.maxw, T.page.maxh) : T.doScrollTo(T.page.maxh), (c = !0);
                                            break;
                                        case 32:
                                            M.spacebarenabled && (l ? T.doScrollBy(T.view.h) : T.doScrollBy(-T.view.h), (c = !0));
                                            break;
                                        case 27:
                                            T.zoomactive && (T.doZoom(), (c = !0));
                                    }
                                    if (c) return T.cancelEvent(e);
                                }
                            }),
                            M.enablekeyboard && T.bind(l, P.isopera && !P.isopera12 ? "keypress" : "keydown", T.onkeypress),
                            T.bind(l, "keydown", function (e) {
                                (e.ctrlKey || !1) && (T.wheelprevented = !0);
                            }),
                            T.bind(l, "keyup", function (e) {
                                e.ctrlKey || !1 || (T.wheelprevented = !1);
                            }),
                            T.bind(a, "blur", function (e) {
                                T.wheelprevented = !1;
                            }),
                            T.bind(a, "resize", T.onscreenresize),
                            T.bind(a, "orientationchange", T.onscreenresize),
                            T.bind(a, "load", T.lazyResize),
                            P.ischrome && !T.ispage && !T.haswrapper)
                        ) {
                            var C = T.win.attr("style"),
                                N = parseFloat(T.win.css("width")) + 1;
                            T.win.css("width", N),
                                T.synched("chromefix", function () {
                                    T.win.attr("style", C);
                                });
                        }
                        if (
                            ((T.onAttributeChange = function (e) {
                                T.lazyResize(T.isieold ? 250 : 30);
                            }),
                            M.enableobserver &&
                                (T.isie11 ||
                                    !1 === m ||
                                    ((T.observerbody = new m(function (e) {
                                        if (
                                            (e.forEach(function (e) {
                                                if ("attributes" == e.type) return E.hasClass("modal-open") && E.hasClass("modal-dialog") && !n.contains(n(".modal-dialog")[0], T.doc[0]) ? T.hide() : T.show();
                                            }),
                                            T.me.clientWidth != T.page.width || T.me.clientHeight != T.page.height)
                                        )
                                            return T.lazyResize(30);
                                    })),
                                    T.observerbody.observe(l.body, { childList: !0, subtree: !0, characterData: !1, attributes: !0, attributeFilter: ["class"] })),
                                !T.ispage && !T.haswrapper))
                        ) {
                            var R = T.win[0];
                            !1 !== m
                                ? ((T.observer = new m(function (e) {
                                      e.forEach(T.onAttributeChange);
                                  })),
                                  T.observer.observe(R, { childList: !0, characterData: !1, attributes: !0, subtree: !1 }),
                                  (T.observerremover = new m(function (e) {
                                      e.forEach(function (e) {
                                          if (e.removedNodes.length > 0) for (var o in e.removedNodes) if (T && e.removedNodes[o] === R) return T.remove();
                                      });
                                  })),
                                  T.observerremover.observe(R.parentNode, { childList: !0, characterData: !1, attributes: !1, subtree: !1 }))
                                : (T.bind(R, P.isie && !P.isie9 ? "propertychange" : "DOMAttrModified", T.onAttributeChange),
                                  P.isie9 && R.attachEvent("onpropertychange", T.onAttributeChange),
                                  T.bind(R, "DOMNodeRemoved", function (e) {
                                      e.target === R && T.remove();
                                  }));
                        }
                        !T.ispage && M.boxzoom && T.bind(a, "resize", T.resizeZoom), T.istextarea && (T.bind(T.win, "keydown", T.lazyResize), T.bind(T.win, "mouseup", T.lazyResize)), T.lazyResize(30);
                    }
                    if ("IFRAME" == this.doc[0].nodeName) {
                        var _ = function () {
                            T.iframexd = !1;
                            var o;
                            try {
                                (o = "contentDocument" in this ? this.contentDocument : this.contentWindow._doc).domain;
                            } catch (e) {
                                (T.iframexd = !0), (o = !1);
                            }
                            if (T.iframexd) return "console" in a && console.log("NiceScroll error: policy restriced iframe"), !0;
                            if (
                                ((T.forcescreen = !0),
                                T.isiframe &&
                                    ((T.iframe = { doc: n(o), html: T.doc.contents().find("html")[0], body: T.doc.contents().find("body")[0] }),
                                    (T.getContentSize = function () {
                                        return { w: Math.max(T.iframe.html.scrollWidth, T.iframe.body.scrollWidth), h: Math.max(T.iframe.html.scrollHeight, T.iframe.body.scrollHeight) };
                                    }),
                                    (T.docscroll = n(T.iframe.body))),
                                !P.isios && M.iframeautoresize && !T.isiframe)
                            ) {
                                T.win.scrollTop(0), T.doc.height("");
                                var t = Math.max(o.getElementsByTagName("html")[0].scrollHeight, o.body.scrollHeight);
                                T.doc.height(t);
                            }
                            T.lazyResize(30),
                                T.css(n(T.iframe.body), e),
                                P.isios && T.haswrapper && T.css(n(o.body), { "-webkit-transform": "translate3d(0,0,0)" }),
                                "contentWindow" in this ? T.bind(this.contentWindow, "scroll", T.onscroll) : T.bind(o, "scroll", T.onscroll),
                                M.enablemousewheel && T.mousewheel(o, T.onmousewheel),
                                M.enablekeyboard && T.bind(o, P.isopera ? "keypress" : "keydown", T.onkeypress),
                                P.cantouch
                                    ? (T.bind(o, "touchstart", T.ontouchstart), T.bind(o, "touchmove", T.ontouchmove))
                                    : M.emulatetouch &&
                                      (T.bind(o, "mousedown", T.ontouchstart),
                                      T.bind(o, "mousemove", function (e) {
                                          return T.ontouchmove(e, !0);
                                      }),
                                      M.grabcursorenabled && P.cursorgrabvalue && T.css(n(o.body), { cursor: P.cursorgrabvalue })),
                                T.bind(o, "mouseup", T.ontouchend),
                                T.zoom && (M.dblclickzoom && T.bind(o, "dblclick", T.doZoom), T.ongesturezoom && T.bind(o, "gestureend", T.ongesturezoom));
                        };
                        this.doc[0].readyState &&
                            "complete" === this.doc[0].readyState &&
                            setTimeout(function () {
                                _.call(T.doc[0], !1);
                            }, 500),
                            T.bind(this.doc, "load", _);
                    }
                }),
                (this.showCursor = function (e, o) {
                    if ((T.cursortimeout && (clearTimeout(T.cursortimeout), (T.cursortimeout = 0)), T.rail)) {
                        if (
                            (T.autohidedom && (T.autohidedom.stop().css({ opacity: M.cursoropacitymax }), (T.cursoractive = !0)),
                            (T.rail.drag && 1 == T.rail.drag.pt) || (void 0 !== e && !1 !== e && (T.scroll.y = (e / T.scrollratio.y) | 0), void 0 !== o && (T.scroll.x = (o / T.scrollratio.x) | 0)),
                            T.cursor.css({ height: T.cursorheight, top: T.scroll.y }),
                            T.cursorh)
                        ) {
                            var t = T.hasreversehr ? T.scrollvaluemaxw - T.scroll.x : T.scroll.x;
                            T.cursorh.css({ width: T.cursorwidth, left: !T.rail.align && T.rail.visibility ? t + T.rail.width : t }), (T.cursoractive = !0);
                        }
                        T.zoom && T.zoom.stop().css({ opacity: M.cursoropacitymax });
                    }
                }),
                (this.hideCursor = function (e) {
                    T.cursortimeout ||
                        (T.rail &&
                            T.autohidedom &&
                            ((T.hasmousefocus && "leave" === M.autohidemode) ||
                                (T.cursortimeout = setTimeout(function () {
                                    (T.rail.active && T.showonmouseevent) || (T.autohidedom.stop().animate({ opacity: M.cursoropacitymin }), T.zoom && T.zoom.stop().animate({ opacity: M.cursoropacitymin }), (T.cursoractive = !1)),
                                        (T.cursortimeout = 0);
                                }, e || M.hidecursordelay))));
                }),
                (this.noticeCursor = function (e, o, t) {
                    T.showCursor(o, t), T.rail.active || T.hideCursor(e);
                }),
                (this.getContentSize = T.ispage
                    ? function () {
                          return { w: Math.max(l.body.scrollWidth, l.documentElement.scrollWidth), h: Math.max(l.body.scrollHeight, l.documentElement.scrollHeight) };
                      }
                    : T.haswrapper
                    ? function () {
                          return { w: T.doc[0].offsetWidth, h: T.doc[0].offsetHeight };
                      }
                    : function () {
                          return { w: T.docscroll[0].scrollWidth, h: T.docscroll[0].scrollHeight };
                      }),
                (this.onResize = function (e, o) {
                    if (!T || !T.win) return !1;
                    var t = T.page.maxh,
                        r = T.page.maxw,
                        i = T.view.h,
                        s = T.view.w;
                    if (
                        ((T.view = { w: T.ispage ? T.win.width() : T.win[0].clientWidth, h: T.ispage ? T.win.height() : T.win[0].clientHeight }),
                        (T.page = o || T.getContentSize()),
                        (T.page.maxh = Math.max(0, T.page.h - T.view.h)),
                        (T.page.maxw = Math.max(0, T.page.w - T.view.w)),
                        T.page.maxh == t && T.page.maxw == r && T.view.w == s && T.view.h == i)
                    ) {
                        if (T.ispage) return T;
                        var n = T.win.offset();
                        if (T.lastposition) {
                            var l = T.lastposition;
                            if (l.top == n.top && l.left == n.left) return T;
                        }
                        T.lastposition = n;
                    }
                    return (
                        0 === T.page.maxh
                            ? (T.hideRail(), (T.scrollvaluemax = 0), (T.scroll.y = 0), (T.scrollratio.y = 0), (T.cursorheight = 0), T.setScrollTop(0), T.rail && (T.rail.scrollable = !1))
                            : ((T.page.maxh -= M.railpadding.top + M.railpadding.bottom), (T.rail.scrollable = !0)),
                        0 === T.page.maxw
                            ? (T.hideRailHr(), (T.scrollvaluemaxw = 0), (T.scroll.x = 0), (T.scrollratio.x = 0), (T.cursorwidth = 0), T.setScrollLeft(0), T.railh && (T.railh.scrollable = !1))
                            : ((T.page.maxw -= M.railpadding.left + M.railpadding.right), T.railh && (T.railh.scrollable = M.horizrailenabled)),
                        (T.railslocked = T.locked || (0 === T.page.maxh && 0 === T.page.maxw)),
                        T.railslocked
                            ? (T.ispage || T.updateScrollBar(T.view), !1)
                            : (T.hidden || (T.rail.visibility || T.showRail(), T.railh && !T.railh.visibility && T.showRailHr()),
                              T.istextarea && T.win.css("resize") && "none" != T.win.css("resize") && (T.view.h -= 20),
                              (T.cursorheight = Math.min(T.view.h, Math.round(T.view.h * (T.view.h / T.page.h)))),
                              (T.cursorheight = M.cursorfixedheight ? M.cursorfixedheight : Math.max(M.cursorminheight, T.cursorheight)),
                              (T.cursorwidth = Math.min(T.view.w, Math.round(T.view.w * (T.view.w / T.page.w)))),
                              (T.cursorwidth = M.cursorfixedheight ? M.cursorfixedheight : Math.max(M.cursorminheight, T.cursorwidth)),
                              (T.scrollvaluemax = T.view.h - T.cursorheight - (M.railpadding.top + M.railpadding.bottom)),
                              T.hasborderbox || (T.scrollvaluemax -= T.cursor[0].offsetHeight - T.cursor[0].clientHeight),
                              T.railh && ((T.railh.width = T.page.maxh > 0 ? T.view.w - T.rail.width : T.view.w), (T.scrollvaluemaxw = T.railh.width - T.cursorwidth - (M.railpadding.left + M.railpadding.right))),
                              T.ispage || T.updateScrollBar(T.view),
                              (T.scrollratio = { x: T.page.maxw / T.scrollvaluemaxw, y: T.page.maxh / T.scrollvaluemax }),
                              T.getScrollTop() > T.page.maxh
                                  ? T.doScrollTop(T.page.maxh)
                                  : ((T.scroll.y = (T.getScrollTop() / T.scrollratio.y) | 0), (T.scroll.x = (T.getScrollLeft() / T.scrollratio.x) | 0), T.cursoractive && T.noticeCursor()),
                              T.scroll.y && 0 === T.getScrollTop() && T.doScrollTo((T.scroll.y * T.scrollratio.y) | 0),
                              T)
                    );
                }),
                (this.resize = T.onResize);
            var O = 0;
            (this.onscreenresize = function (e) {
                clearTimeout(O);
                var o = !T.ispage && !T.haswrapper;
                o && T.hideRails(),
                    (O = setTimeout(function () {
                        T && (o && T.showRails(), T.resize()), (O = 0);
                    }, 120));
            }),
                (this.lazyResize = function (e) {
                    return (
                        clearTimeout(O),
                        (e = isNaN(e) ? 240 : e),
                        (O = setTimeout(function () {
                            T && T.resize(), (O = 0);
                        }, e)),
                        T
                    );
                }),
                (this.jqbind = function (e, o, t) {
                    T.events.push({ e: e, n: o, f: t, q: !0 }), n(e).on(o, t);
                }),
                (this.mousewheel = function (e, o, t) {
                    var r = "jquery" in e ? e[0] : e;
                    if ("onwheel" in l.createElement("div")) T._bind(r, "wheel", o, t || !1);
                    else {
                        var i = void 0 !== l.onmousewheel ? "mousewheel" : "DOMMouseScroll";
                        S(r, i, o, t || !1), "DOMMouseScroll" == i && S(r, "MozMousePixelScroll", o, t || !1);
                    }
                });
            var Y = !1;
            if (P.haseventlistener) {
                try {
                    var H = Object.defineProperty({}, "passive", {
                        get: function () {
                            Y = !0;
                        },
                    });
                    a.addEventListener("test", null, H);
                } catch (e) {}
                (this.stopPropagation = function (e) {
                    return !!e && ((e = e.original ? e.original : e).stopPropagation(), !1);
                }),
                    (this.cancelEvent = function (e) {
                        return e.cancelable && e.preventDefault(), e.stopImmediatePropagation(), e.preventManipulation && e.preventManipulation(), !1;
                    });
            } else
                (Event.prototype.preventDefault = function () {
                    this.returnValue = !1;
                }),
                    (Event.prototype.stopPropagation = function () {
                        this.cancelBubble = !0;
                    }),
                    (a.constructor.prototype.addEventListener = l.constructor.prototype.addEventListener = Element.prototype.addEventListener = function (e, o, t) {
                        this.attachEvent("on" + e, o);
                    }),
                    (a.constructor.prototype.removeEventListener = l.constructor.prototype.removeEventListener = Element.prototype.removeEventListener = function (e, o, t) {
                        this.detachEvent("on" + e, o);
                    }),
                    (this.cancelEvent = function (e) {
                        return (e = e || a.event) && ((e.cancelBubble = !0), (e.cancel = !0), (e.returnValue = !1)), !1;
                    }),
                    (this.stopPropagation = function (e) {
                        return (e = e || a.event) && (e.cancelBubble = !0), !1;
                    });
            (this.delegate = function (e, o, t, r, i) {
                var s = d[o] || !1;
                s ||
                    ((s = {
                        a: [],
                        l: [],
                        f: function (e) {
                            for (var o = s.l, t = !1, r = o.length - 1; r >= 0; r--) if (!1 === (t = o[r].call(e.target, e))) return !1;
                            return t;
                        },
                    }),
                    T.bind(e, o, s.f, r, i),
                    (d[o] = s)),
                    T.ispage ? ((s.a = [T.id].concat(s.a)), (s.l = [t].concat(s.l))) : (s.a.push(T.id), s.l.push(t));
            }),
                (this.undelegate = function (e, o, t, r, i) {
                    var s = d[o] || !1;
                    if (s && s.l) for (var n = 0, l = s.l.length; n < l; n++) s.a[n] === T.id && (s.a.splice(n), s.l.splice(n), 0 === s.a.length && (T._unbind(e, o, s.l.f), (d[o] = null)));
                }),
                (this.bind = function (e, o, t, r, i) {
                    var s = "jquery" in e ? e[0] : e;
                    T._bind(s, o, t, r || !1, i || !1);
                }),
                (this._bind = function (e, o, t, r, i) {
                    T.events.push({ e: e, n: o, f: t, b: r, q: !1 }), Y && i ? e.addEventListener(o, t, { passive: !1, capture: r }) : e.addEventListener(o, t, r || !1);
                }),
                (this._unbind = function (e, o, t, r) {
                    d[o] ? T.undelegate(e, o, t, r) : e.removeEventListener(o, t, r);
                }),
                (this.unbindAll = function () {
                    for (var e = 0; e < T.events.length; e++) {
                        var o = T.events[e];
                        o.q ? o.e.unbind(o.n, o.f) : T._unbind(o.e, o.n, o.f, o.b);
                    }
                }),
                (this.showRails = function () {
                    return T.showRail().showRailHr();
                }),
                (this.showRail = function () {
                    return 0 === T.page.maxh || (!T.ispage && "none" == T.win.css("display")) || ((T.rail.visibility = !0), T.rail.css("display", "block")), T;
                }),
                (this.showRailHr = function () {
                    return T.railh && (0 === T.page.maxw || (!T.ispage && "none" == T.win.css("display")) || ((T.railh.visibility = !0), T.railh.css("display", "block"))), T;
                }),
                (this.hideRails = function () {
                    return T.hideRail().hideRailHr();
                }),
                (this.hideRail = function () {
                    return (T.rail.visibility = !1), T.rail.css("display", "none"), T;
                }),
                (this.hideRailHr = function () {
                    return T.railh && ((T.railh.visibility = !1), T.railh.css("display", "none")), T;
                }),
                (this.show = function () {
                    return (T.hidden = !1), (T.railslocked = !1), T.showRails();
                }),
                (this.hide = function () {
                    return (T.hidden = !0), (T.railslocked = !0), T.hideRails();
                }),
                (this.toggle = function () {
                    return T.hidden ? T.show() : T.hide();
                }),
                (this.remove = function () {
                    T.stop(), T.cursortimeout && clearTimeout(T.cursortimeout);
                    for (var e in T.delaylist) T.delaylist[e] && h(T.delaylist[e].h);
                    T.doZoomOut(),
                        T.unbindAll(),
                        P.isie9 && T.win[0].detachEvent("onpropertychange", T.onAttributeChange),
                        !1 !== T.observer && T.observer.disconnect(),
                        !1 !== T.observerremover && T.observerremover.disconnect(),
                        !1 !== T.observerbody && T.observerbody.disconnect(),
                        (T.events = null),
                        T.cursor && T.cursor.remove(),
                        T.cursorh && T.cursorh.remove(),
                        T.rail && T.rail.remove(),
                        T.railh && T.railh.remove(),
                        T.zoom && T.zoom.remove();
                    for (var o = 0; o < T.saved.css.length; o++) {
                        var t = T.saved.css[o];
                        t[0].css(t[1], void 0 === t[2] ? "" : t[2]);
                    }
                    (T.saved = !1), T.me.data("__nicescroll", "");
                    var r = n.nicescroll;
                    r.each(function (e) {
                        if (this && this.id === T.id) {
                            delete r[e];
                            for (var o = ++e; o < r.length; o++, e++) r[e] = r[o];
                            --r.length && delete r[r.length];
                        }
                    });
                    for (var i in T) (T[i] = null), delete T[i];
                    T = null;
                }),
                (this.scrollstart = function (e) {
                    return (this.onscrollstart = e), T;
                }),
                (this.scrollend = function (e) {
                    return (this.onscrollend = e), T;
                }),
                (this.scrollcancel = function (e) {
                    return (this.onscrollcancel = e), T;
                }),
                (this.zoomin = function (e) {
                    return (this.onzoomin = e), T;
                }),
                (this.zoomout = function (e) {
                    return (this.onzoomout = e), T;
                }),
                (this.isScrollable = function (e) {
                    var o = e.target ? e.target : e;
                    if ("OPTION" == o.nodeName) return !0;
                    for (; o && 1 == o.nodeType && o !== this.me[0] && !/^BODY|HTML/.test(o.nodeName); ) {
                        var t = n(o),
                            r = t.css("overflowY") || t.css("overflowX") || t.css("overflow") || "";
                        if (/scroll|auto/.test(r)) return o.clientHeight != o.scrollHeight;
                        o = !!o.parentNode && o.parentNode;
                    }
                    return !1;
                }),
                (this.getViewport = function (e) {
                    for (var o = !(!e || !e.parentNode) && e.parentNode; o && 1 == o.nodeType && !/^BODY|HTML/.test(o.nodeName); ) {
                        var t = n(o);
                        if (/fixed|absolute/.test(t.css("position"))) return t;
                        var r = t.css("overflowY") || t.css("overflowX") || t.css("overflow") || "";
                        if (/scroll|auto/.test(r) && o.clientHeight != o.scrollHeight) return t;
                        if (t.getNiceScroll().length > 0) return t;
                        o = !!o.parentNode && o.parentNode;
                    }
                    return !1;
                }),
                (this.triggerScrollStart = function (e, o, t, r, i) {
                    if (T.onscrollstart) {
                        var s = { type: "scrollstart", current: { x: e, y: o }, request: { x: t, y: r }, end: { x: T.newscrollx, y: T.newscrolly }, speed: i };
                        T.onscrollstart.call(T, s);
                    }
                }),
                (this.triggerScrollEnd = function () {
                    if (T.onscrollend) {
                        var e = T.getScrollLeft(),
                            o = T.getScrollTop(),
                            t = { type: "scrollend", current: { x: e, y: o }, end: { x: e, y: o } };
                        T.onscrollend.call(T, t);
                    }
                });
            var B = 0,
                X = 0,
                D = 0,
                A = 1,
                q = !1;
            if (
                ((this.onmousewheel = function (e) {
                    if (T.wheelprevented || T.locked) return !1;
                    if (T.railslocked) return T.debounced("checkunlock", T.resize, 250), !1;
                    if (T.rail.drag) return T.cancelEvent(e);
                    if (("auto" === M.oneaxismousemode && 0 !== e.deltaX && (M.oneaxismousemode = !1), M.oneaxismousemode && 0 === e.deltaX && !T.rail.scrollable)) return !T.railh || !T.railh.scrollable || T.onmousewheelhr(e);
                    var o = f(),
                        t = !1;
                    if ((M.preservenativescrolling && T.checkarea + 600 < o && ((T.nativescrollingarea = T.isScrollable(e)), (t = !0)), (T.checkarea = o), T.nativescrollingarea)) return !0;
                    var r = k(e, !1, t);
                    return r && (T.checkarea = 0), r;
                }),
                (this.onmousewheelhr = function (e) {
                    if (!T.wheelprevented) {
                        if (T.railslocked || !T.railh.scrollable) return !0;
                        if (T.rail.drag) return T.cancelEvent(e);
                        var o = f(),
                            t = !1;
                        return M.preservenativescrolling && T.checkarea + 600 < o && ((T.nativescrollingarea = T.isScrollable(e)), (t = !0)), (T.checkarea = o), !!T.nativescrollingarea || (T.railslocked ? T.cancelEvent(e) : k(e, !0, t));
                    }
                }),
                (this.stop = function () {
                    return T.cancelScroll(), T.scrollmon && T.scrollmon.stop(), (T.cursorfreezed = !1), (T.scroll.y = Math.round(T.getScrollTop() * (1 / T.scrollratio.y))), T.noticeCursor(), T;
                }),
                (this.getTransitionSpeed = function (e) {
                    return (80 + (e / 72) * M.scrollspeed) | 0;
                }),
                M.smoothscroll)
            )
                if (T.ishwscroll && P.hastransition && M.usetransition && M.smoothscroll) {
                    var j = "";
                    (this.resetTransition = function () {
                        (j = ""), T.doc.css(P.prefixstyle + "transition-duration", "0ms");
                    }),
                        (this.prepareTransition = function (e, o) {
                            var t = o ? e : T.getTransitionSpeed(e),
                                r = t + "ms";
                            return j !== r && ((j = r), T.doc.css(P.prefixstyle + "transition-duration", r)), t;
                        }),
                        (this.doScrollLeft = function (e, o) {
                            var t = T.scrollrunning ? T.newscrolly : T.getScrollTop();
                            T.doScrollPos(e, t, o);
                        }),
                        (this.doScrollTop = function (e, o) {
                            var t = T.scrollrunning ? T.newscrollx : T.getScrollLeft();
                            T.doScrollPos(t, e, o);
                        }),
                        (this.cursorupdate = {
                            running: !1,
                            start: function () {
                                var e = this;
                                if (!e.running) {
                                    e.running = !0;
                                    var o = function () {
                                        e.running && u(o), T.showCursor(T.getScrollTop(), T.getScrollLeft()), T.notifyScrollEvent(T.win[0]);
                                    };
                                    u(o);
                                }
                            },
                            stop: function () {
                                this.running = !1;
                            },
                        }),
                        (this.doScrollPos = function (e, o, t) {
                            var r = T.getScrollTop(),
                                i = T.getScrollLeft();
                            if (
                                (((T.newscrolly - r) * (o - r) < 0 || (T.newscrollx - i) * (e - i) < 0) && T.cancelScroll(),
                                M.bouncescroll
                                    ? (o < 0 ? (o = (o / 2) | 0) : o > T.page.maxh && (o = (T.page.maxh + (o - T.page.maxh) / 2) | 0), e < 0 ? (e = (e / 2) | 0) : e > T.page.maxw && (e = (T.page.maxw + (e - T.page.maxw) / 2) | 0))
                                    : (o < 0 ? (o = 0) : o > T.page.maxh && (o = T.page.maxh), e < 0 ? (e = 0) : e > T.page.maxw && (e = T.page.maxw)),
                                T.scrollrunning && e == T.newscrollx && o == T.newscrolly)
                            )
                                return !1;
                            (T.newscrolly = o), (T.newscrollx = e);
                            var s = T.getScrollTop(),
                                n = T.getScrollLeft(),
                                l = {};
                            (l.x = e - n), (l.y = o - s);
                            var a = 0 | Math.sqrt(l.x * l.x + l.y * l.y),
                                c = T.prepareTransition(a);
                            T.scrollrunning || ((T.scrollrunning = !0), T.triggerScrollStart(n, s, e, o, c), T.cursorupdate.start()),
                                (T.scrollendtrapped = !0),
                                P.transitionend || (T.scrollendtrapped && clearTimeout(T.scrollendtrapped), (T.scrollendtrapped = setTimeout(T.onScrollTransitionEnd, c))),
                                T.setScrollTop(T.newscrolly),
                                T.setScrollLeft(T.newscrollx);
                        }),
                        (this.cancelScroll = function () {
                            if (!T.scrollendtrapped) return !0;
                            var e = T.getScrollTop(),
                                o = T.getScrollLeft();
                            return (
                                (T.scrollrunning = !1),
                                P.transitionend || clearTimeout(P.transitionend),
                                (T.scrollendtrapped = !1),
                                T.resetTransition(),
                                T.setScrollTop(e),
                                T.railh && T.setScrollLeft(o),
                                T.timerscroll && T.timerscroll.tm && clearInterval(T.timerscroll.tm),
                                (T.timerscroll = !1),
                                (T.cursorfreezed = !1),
                                T.cursorupdate.stop(),
                                T.showCursor(e, o),
                                T
                            );
                        }),
                        (this.onScrollTransitionEnd = function () {
                            if (T.scrollendtrapped) {
                                var e = T.getScrollTop(),
                                    o = T.getScrollLeft();
                                if ((e < 0 ? (e = 0) : e > T.page.maxh && (e = T.page.maxh), o < 0 ? (o = 0) : o > T.page.maxw && (o = T.page.maxw), e != T.newscrolly || o != T.newscrollx)) return T.doScrollPos(o, e, M.snapbackspeed);
                                T.scrollrunning && T.triggerScrollEnd(),
                                    (T.scrollrunning = !1),
                                    (T.scrollendtrapped = !1),
                                    T.resetTransition(),
                                    (T.timerscroll = !1),
                                    T.setScrollTop(e),
                                    T.railh && T.setScrollLeft(o),
                                    T.cursorupdate.stop(),
                                    T.noticeCursor(!1, e, o),
                                    (T.cursorfreezed = !1);
                            }
                        });
                } else
                    (this.doScrollLeft = function (e, o) {
                        var t = T.scrollrunning ? T.newscrolly : T.getScrollTop();
                        T.doScrollPos(e, t, o);
                    }),
                        (this.doScrollTop = function (e, o) {
                            var t = T.scrollrunning ? T.newscrollx : T.getScrollLeft();
                            T.doScrollPos(t, e, o);
                        }),
                        (this.doScrollPos = function (e, o, t) {
                            var r = T.getScrollTop(),
                                i = T.getScrollLeft();
                            ((T.newscrolly - r) * (o - r) < 0 || (T.newscrollx - i) * (e - i) < 0) && T.cancelScroll();
                            var s = !1;
                            if (
                                ((T.bouncescroll && T.rail.visibility) || (o < 0 ? ((o = 0), (s = !0)) : o > T.page.maxh && ((o = T.page.maxh), (s = !0))),
                                (T.bouncescroll && T.railh.visibility) || (e < 0 ? ((e = 0), (s = !0)) : e > T.page.maxw && ((e = T.page.maxw), (s = !0))),
                                T.scrollrunning && T.newscrolly === o && T.newscrollx === e)
                            )
                                return !0;
                            (T.newscrolly = o), (T.newscrollx = e), (T.dst = {}), (T.dst.x = e - i), (T.dst.y = o - r), (T.dst.px = i), (T.dst.py = r);
                            var n = 0 | Math.sqrt(T.dst.x * T.dst.x + T.dst.y * T.dst.y),
                                l = T.getTransitionSpeed(n);
                            T.bzscroll = {};
                            var a = s ? 1 : 0.58;
                            (T.bzscroll.x = new R(i, T.newscrollx, l, 0, 0, a, 1)), (T.bzscroll.y = new R(r, T.newscrolly, l, 0, 0, a, 1));
                            f();
                            var c = function () {
                                if (T.scrollrunning) {
                                    var e = T.bzscroll.y.getPos();
                                    T.setScrollLeft(T.bzscroll.x.getNow()), T.setScrollTop(T.bzscroll.y.getNow()), e <= 1 ? (T.timer = u(c)) : ((T.scrollrunning = !1), (T.timer = 0), T.triggerScrollEnd());
                                }
                            };
                            T.scrollrunning || (T.triggerScrollStart(i, r, e, o, l), (T.scrollrunning = !0), (T.timer = u(c)));
                        }),
                        (this.cancelScroll = function () {
                            return T.timer && h(T.timer), (T.timer = 0), (T.bzscroll = !1), (T.scrollrunning = !1), T;
                        });
            else
                (this.doScrollLeft = function (e, o) {
                    var t = T.getScrollTop();
                    T.doScrollPos(e, t, o);
                }),
                    (this.doScrollTop = function (e, o) {
                        var t = T.getScrollLeft();
                        T.doScrollPos(t, e, o);
                    }),
                    (this.doScrollPos = function (e, o, t) {
                        var r = e > T.page.maxw ? T.page.maxw : e;
                        r < 0 && (r = 0);
                        var i = o > T.page.maxh ? T.page.maxh : o;
                        i < 0 && (i = 0),
                            T.synched("scroll", function () {
                                T.setScrollTop(i), T.setScrollLeft(r);
                            });
                    }),
                    (this.cancelScroll = function () {});
            (this.doScrollBy = function (e, o) {
                z(0, e);
            }),
                (this.doScrollLeftBy = function (e, o) {
                    z(e, 0);
                }),
                (this.doScrollTo = function (e, o) {
                    var t = o ? Math.round(e * T.scrollratio.y) : e;
                    t < 0 ? (t = 0) : t > T.page.maxh && (t = T.page.maxh), (T.cursorfreezed = !1), T.doScrollTop(e);
                }),
                (this.checkContentSize = function () {
                    var e = T.getContentSize();
                    (e.h == T.page.h && e.w == T.page.w) || T.resize(!1, e);
                }),
                (T.onscroll = function (e) {
                    T.rail.drag ||
                        T.cursorfreezed ||
                        T.synched("scroll", function () {
                            (T.scroll.y = Math.round(T.getScrollTop() / T.scrollratio.y)), T.railh && (T.scroll.x = Math.round(T.getScrollLeft() / T.scrollratio.x)), T.noticeCursor();
                        });
                }),
                T.bind(T.docscroll, "scroll", T.onscroll),
                (this.doZoomIn = function (e) {
                    if (!T.zoomactive) {
                        (T.zoomactive = !0), (T.zoomrestore = { style: {} });
                        var o = ["position", "top", "left", "zIndex", "backgroundColor", "marginTop", "marginBottom", "marginLeft", "marginRight"],
                            t = T.win[0].style;
                        for (var r in o) {
                            var i = o[r];
                            T.zoomrestore.style[i] = void 0 !== t[i] ? t[i] : "";
                        }
                        (T.zoomrestore.style.width = T.win.css("width")),
                            (T.zoomrestore.style.height = T.win.css("height")),
                            (T.zoomrestore.padding = { w: T.win.outerWidth() - T.win.width(), h: T.win.outerHeight() - T.win.height() }),
                            P.isios4 && ((T.zoomrestore.scrollTop = c.scrollTop()), c.scrollTop(0)),
                            T.win.css({ position: P.isios4 ? "absolute" : "fixed", top: 0, left: 0, zIndex: s + 100, margin: 0 });
                        var n = T.win.css("backgroundColor");
                        return (
                            ("" === n || /transparent|rgba\(0, 0, 0, 0\)|rgba\(0,0,0,0\)/.test(n)) && T.win.css("backgroundColor", "#fff"),
                            T.rail.css({ zIndex: s + 101 }),
                            T.zoom.css({ zIndex: s + 102 }),
                            T.zoom.css("backgroundPosition", "0 -18px"),
                            T.resizeZoom(),
                            T.onzoomin && T.onzoomin.call(T),
                            T.cancelEvent(e)
                        );
                    }
                }),
                (this.doZoomOut = function (e) {
                    if (T.zoomactive)
                        return (
                            (T.zoomactive = !1),
                            T.win.css("margin", ""),
                            T.win.css(T.zoomrestore.style),
                            P.isios4 && c.scrollTop(T.zoomrestore.scrollTop),
                            T.rail.css({ "z-index": T.zindex }),
                            T.zoom.css({ "z-index": T.zindex }),
                            (T.zoomrestore = !1),
                            T.zoom.css("backgroundPosition", "0 0"),
                            T.onResize(),
                            T.onzoomout && T.onzoomout.call(T),
                            T.cancelEvent(e)
                        );
                }),
                (this.doZoom = function (e) {
                    return T.zoomactive ? T.doZoomOut(e) : T.doZoomIn(e);
                }),
                (this.resizeZoom = function () {
                    if (T.zoomactive) {
                        var e = T.getScrollTop();
                        T.win.css({ width: c.width() - T.zoomrestore.padding.w + "px", height: c.height() - T.zoomrestore.padding.h + "px" }), T.onResize(), T.setScrollTop(Math.min(T.page.maxh, e));
                    }
                }),
                this.init(),
                n.nicescroll.push(this);
        },
        y = function (e) {
            var o = this;
            (this.nc = e),
                (this.lastx = 0),
                (this.lasty = 0),
                (this.speedx = 0),
                (this.speedy = 0),
                (this.lasttime = 0),
                (this.steptime = 0),
                (this.snapx = !1),
                (this.snapy = !1),
                (this.demulx = 0),
                (this.demuly = 0),
                (this.lastscrollx = -1),
                (this.lastscrolly = -1),
                (this.chkx = 0),
                (this.chky = 0),
                (this.timer = 0),
                (this.reset = function (e, t) {
                    o.stop(), (o.steptime = 0), (o.lasttime = f()), (o.speedx = 0), (o.speedy = 0), (o.lastx = e), (o.lasty = t), (o.lastscrollx = -1), (o.lastscrolly = -1);
                }),
                (this.update = function (e, t) {
                    var r = f();
                    (o.steptime = r - o.lasttime), (o.lasttime = r);
                    var i = t - o.lasty,
                        s = e - o.lastx,
                        n = o.nc.getScrollTop() + i,
                        l = o.nc.getScrollLeft() + s;
                    (o.snapx = l < 0 || l > o.nc.page.maxw), (o.snapy = n < 0 || n > o.nc.page.maxh), (o.speedx = s), (o.speedy = i), (o.lastx = e), (o.lasty = t);
                }),
                (this.stop = function () {
                    o.nc.unsynched("domomentum2d"), o.timer && clearTimeout(o.timer), (o.timer = 0), (o.lastscrollx = -1), (o.lastscrolly = -1);
                }),
                (this.doSnapy = function (e, t) {
                    var r = !1;
                    t < 0 ? ((t = 0), (r = !0)) : t > o.nc.page.maxh && ((t = o.nc.page.maxh), (r = !0)),
                        e < 0 ? ((e = 0), (r = !0)) : e > o.nc.page.maxw && ((e = o.nc.page.maxw), (r = !0)),
                        r ? o.nc.doScrollPos(e, t, o.nc.opt.snapbackspeed) : o.nc.triggerScrollEnd();
                }),
                (this.doMomentum = function (e) {
                    var t = f(),
                        r = e ? t + e : o.lasttime,
                        i = o.nc.getScrollLeft(),
                        s = o.nc.getScrollTop(),
                        n = o.nc.page.maxh,
                        l = o.nc.page.maxw;
                    (o.speedx = l > 0 ? Math.min(60, o.speedx) : 0), (o.speedy = n > 0 ? Math.min(60, o.speedy) : 0);
                    var a = r && t - r <= 60;
                    (s < 0 || s > n || i < 0 || i > l) && (a = !1);
                    var c = !(!o.speedy || !a) && o.speedy,
                        d = !(!o.speedx || !a) && o.speedx;
                    if (c || d) {
                        var u = Math.max(16, o.steptime);
                        if (u > 50) {
                            var h = u / 50;
                            (o.speedx *= h), (o.speedy *= h), (u = 50);
                        }
                        (o.demulxy = 0), (o.lastscrollx = o.nc.getScrollLeft()), (o.chkx = o.lastscrollx), (o.lastscrolly = o.nc.getScrollTop()), (o.chky = o.lastscrolly);
                        var p = o.lastscrollx,
                            m = o.lastscrolly,
                            g = function () {
                                var e = f() - t > 600 ? 0.04 : 0.02;
                                o.speedx && ((p = Math.floor(o.lastscrollx - o.speedx * (1 - o.demulxy))), (o.lastscrollx = p), (p < 0 || p > l) && (e = 0.1)),
                                    o.speedy && ((m = Math.floor(o.lastscrolly - o.speedy * (1 - o.demulxy))), (o.lastscrolly = m), (m < 0 || m > n) && (e = 0.1)),
                                    (o.demulxy = Math.min(1, o.demulxy + e)),
                                    o.nc.synched("domomentum2d", function () {
                                        if (o.speedx) {
                                            o.nc.getScrollLeft();
                                            (o.chkx = p), o.nc.setScrollLeft(p);
                                        }
                                        if (o.speedy) {
                                            o.nc.getScrollTop();
                                            (o.chky = m), o.nc.setScrollTop(m);
                                        }
                                        o.timer || (o.nc.hideCursor(), o.doSnapy(p, m));
                                    }),
                                    o.demulxy < 1 ? (o.timer = setTimeout(g, u)) : (o.stop(), o.nc.hideCursor(), o.doSnapy(p, m));
                            };
                        g();
                    } else o.doSnapy(o.nc.getScrollLeft(), o.nc.getScrollTop());
                });
        },
        x = e.fn.scrollTop;
    (e.cssHooks.pageYOffset = {
        get: function (e, o, t) {
            var r = n.data(e, "__nicescroll") || !1;
            return r && r.ishwscroll ? r.getScrollTop() : x.call(e);
        },
        set: function (e, o) {
            var t = n.data(e, "__nicescroll") || !1;
            return t && t.ishwscroll ? t.setScrollTop(parseInt(o)) : x.call(e, o), this;
        },
    }),
        (e.fn.scrollTop = function (e) {
            if (void 0 === e) {
                var o = !!this[0] && (n.data(this[0], "__nicescroll") || !1);
                return o && o.ishwscroll ? o.getScrollTop() : x.call(this);
            }
            return this.each(function () {
                var o = n.data(this, "__nicescroll") || !1;
                o && o.ishwscroll ? o.setScrollTop(parseInt(e)) : x.call(n(this), e);
            });
        });
    var S = e.fn.scrollLeft;
    (n.cssHooks.pageXOffset = {
        get: function (e, o, t) {
            var r = n.data(e, "__nicescroll") || !1;
            return r && r.ishwscroll ? r.getScrollLeft() : S.call(e);
        },
        set: function (e, o) {
            var t = n.data(e, "__nicescroll") || !1;
            return t && t.ishwscroll ? t.setScrollLeft(parseInt(o)) : S.call(e, o), this;
        },
    }),
        (e.fn.scrollLeft = function (e) {
            if (void 0 === e) {
                var o = !!this[0] && (n.data(this[0], "__nicescroll") || !1);
                return o && o.ishwscroll ? o.getScrollLeft() : S.call(this);
            }
            return this.each(function () {
                var o = n.data(this, "__nicescroll") || !1;
                o && o.ishwscroll ? o.setScrollLeft(parseInt(e)) : S.call(n(this), e);
            });
        });
    var z = function (e) {
        var o = this;
        if (
            ((this.length = 0),
            (this.name = "nicescrollarray"),
            (this.each = function (e) {
                return n.each(o, e), o;
            }),
            (this.push = function (e) {
                (o[o.length] = e), o.length++;
            }),
            (this.eq = function (e) {
                return o[e];
            }),
            e)
        )
            for (var t = 0; t < e.length; t++) {
                var r = n.data(e[t], "__nicescroll") || !1;
                r && ((this[this.length] = r), this.length++);
            }
        return this;
    };
    !(function (e, o, t) {
        for (var r = 0, i = o.length; r < i; r++) t(e, o[r]);
    })(z.prototype, ["show", "hide", "toggle", "onResize", "resize", "remove", "stop", "doScrollPos"], function (e, o) {
        e[o] = function () {
            var e = arguments;
            return this.each(function () {
                this[o].apply(this, e);
            });
        };
    }),
        (e.fn.getNiceScroll = function (e) {
            return void 0 === e ? new z(this) : (this[e] && n.data(this[e], "__nicescroll")) || !1;
        }),
        ((e.expr.pseudos || e.expr[":"]).nicescroll = function (e) {
            return void 0 !== n.data(e, "__nicescroll");
        }),
        (n.fn.niceScroll = function (e, o) {
            void 0 !== o || "object" != typeof e || "jquery" in e || ((o = e), (e = !1));
            var t = new z();
            return (
                this.each(function () {
                    var r = n(this),
                        i = n.extend({}, o);
                    if (e) {
                        var s = n(e);
                        (i.doc = s.length > 1 ? n(e, r) : s), (i.win = r);
                    }
                    !("doc" in i) || "win" in i || (i.win = r);
                    var l = r.data("__nicescroll") || !1;
                    l || ((i.doc = i.doc || r), (l = new b(i, r)), r.data("__nicescroll", l)), t.push(l);
                }),
                1 === t.length ? t[0] : t
            );
        }),
        (a.NiceScroll = {
            getjQuery: function () {
                return e;
            },
        }),
        n.nicescroll || ((n.nicescroll = new z()), (n.nicescroll.options = g));
});
