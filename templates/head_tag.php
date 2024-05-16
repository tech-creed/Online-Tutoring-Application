<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>English Hub</title>
  <link rel="stylesheet" id="wp-block-library-css" href="../../../assets/wp-includes/css/dist/block-library/style.min.css?ver=6.4.1" media="all" />

  <script>
    window._wpemojiSettings = {
      baseUrl: "https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/72x72\/",
      ext: ".png",
      svgUrl: "https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/svg\/",
      svgExt: ".svg",
      source: {
        concatemoji: "https:\/\/themesvila.com\/themes-wp\/edusion\/wp-includes\/js\/wp-emoji-release.min.js?ver=6.4.1",
      },
    };
    /*! This file is auto-generated */
    !(function(i, n) {
      var o, s, e;

      function c(e) {
        try {
          var t = {
            supportTests: e,
            timestamp: new Date().valueOf()
          };
          sessionStorage.setItem(o, JSON.stringify(t));
        } catch (e) {}
      }

      function p(e, t, n) {
        e.clearRect(0, 0, e.canvas.width, e.canvas.height),
          e.fillText(t, 0, 0);
        var t = new Uint32Array(
            e.getImageData(0, 0, e.canvas.width, e.canvas.height).data
          ),
          r =
          (e.clearRect(0, 0, e.canvas.width, e.canvas.height),
            e.fillText(n, 0, 0),
            new Uint32Array(
              e.getImageData(0, 0, e.canvas.width, e.canvas.height).data
            ));
        return t.every(function(e, t) {
          return e === r[t];
        });
      }

      function u(e, t, n) {
        switch (t) {
          case "flag":
            return n(
                e,
                "\ud83c\udff3\ufe0f\u200d\u26a7\ufe0f",
                "\ud83c\udff3\ufe0f\u200b\u26a7\ufe0f"
              ) ?
              !1 :
              !n(
                e,
                "\ud83c\uddfa\ud83c\uddf3",
                "\ud83c\uddfa\u200b\ud83c\uddf3"
              ) &&
              !n(
                e,
                "\ud83c\udff4\udb40\udc67\udb40\udc62\udb40\udc65\udb40\udc6e\udb40\udc67\udb40\udc7f",
                "\ud83c\udff4\u200b\udb40\udc67\u200b\udb40\udc62\u200b\udb40\udc65\u200b\udb40\udc6e\u200b\udb40\udc67\u200b\udb40\udc7f"
              );
          case "emoji":
            return !n(
              e,
              "\ud83e\udef1\ud83c\udffb\u200d\ud83e\udef2\ud83c\udfff",
              "\ud83e\udef1\ud83c\udffb\u200b\ud83e\udef2\ud83c\udfff"
            );
        }
        return !1;
      }

      function f(e, t, n) {
        var r =
          "undefined" != typeof WorkerGlobalScope &&
          self instanceof WorkerGlobalScope ?
          new OffscreenCanvas(300, 150) :
          i.createElement("canvas"),
          a = r.getContext("2d", {
            willReadFrequently: !0
          }),
          o = ((a.textBaseline = "top"), (a.font = "600 32px Arial"), {});
        return (
          e.forEach(function(e) {
            o[e] = t(a, e, n);
          }),
          o
        );
      }

      function t(e) {
        var t = i.createElement("script");
        (t.src = e), (t.defer = !0), i.head.appendChild(t);
      }
      "undefined" != typeof Promise &&
        ((o = "wpEmojiSettingsSupports"),
          (s = ["flag", "emoji"]),
          (n.supports = {
            everything: !0,
            everythingExceptFlag: !0
          }),
          (e = new Promise(function(e) {
            i.addEventListener("DOMContentLoaded", e, {
              once: !0
            });
          })),
          new Promise(function(t) {
            var n = (function() {
              try {
                var e = JSON.parse(sessionStorage.getItem(o));
                if (
                  "object" == typeof e &&
                  "number" == typeof e.timestamp &&
                  new Date().valueOf() < e.timestamp + 604800 &&
                  "object" == typeof e.supportTests
                )
                  return e.supportTests;
              } catch (e) {}
              return null;
            })();
            if (!n) {
              if (
                "undefined" != typeof Worker &&
                "undefined" != typeof OffscreenCanvas &&
                "undefined" != typeof URL &&
                URL.createObjectURL &&
                "undefined" != typeof Blob
              )
                try {
                  var e =
                    "postMessage(" +
                    f.toString() +
                    "(" + [JSON.stringify(s), u.toString(), p.toString()].join(
                      ","
                    ) +
                    "));",
                    r = new Blob([e], {
                      type: "text/javascript"
                    }),
                    a = new Worker(URL.createObjectURL(r), {
                      name: "wpTestEmojiSupports",
                    });
                  return void(a.onmessage = function(e) {
                    c((n = e.data)), a.terminate(), t(n);
                  });
                } catch (e) {}
              c((n = f(s, u, p)));
            }
            t(n);
          })
          .then(function(e) {
            for (var t in e)
              (n.supports[t] = e[t]),
              (n.supports.everything =
                n.supports.everything && n.supports[t]),
              "flag" !== t &&
              (n.supports.everythingExceptFlag =
                n.supports.everythingExceptFlag && n.supports[t]);
            (n.supports.everythingExceptFlag =
              n.supports.everythingExceptFlag && !n.supports.flag),
            (n.DOMReady = !1),
            (n.readyCallback = function() {
              n.DOMReady = !0;
            });
          })
          .then(function() {
            return e;
          })
          .then(function() {
            var e;
            n.supports.everything ||
              (n.readyCallback(),
                (e = n.source || {}).concatemoji ?
                t(e.concatemoji) :
                e.wpemoji && e.twemoji && (t(e.twemoji), t(e.wpemoji)));
          }));
    })((window, document), window._wpemojiSettings);
  </script>
  <style id="wp-emoji-styles-inline-css">
    img.wp-smiley,
    img.emoji {
      display: inline !important;
      border: none !important;
      box-shadow: none !important;
      height: 1em !important;
      width: 1em !important;
      margin: 0 0.07em !important;
      vertical-align: -0.1em !important;
      background: none !important;
      padding: 0 !important;
    }
  </style>

  <style id="wp-block-library-inline-css">
    .wp-block-quote.is-style-blue-quote {
      color: blue;
    }
  </style>
  <style id="wp-block-library-theme-inline-css">
    .wp-block-audio figcaption {
      color: #555;
      font-size: 13px;
      text-align: center;
    }

    .is-dark-theme .wp-block-audio figcaption {
      color: hsla(0, 0%, 100%, 0.65);
    }

    .wp-block-audio {
      margin: 0 0 1em;
    }

    .wp-block-code {
      border: 1px solid #ccc;
      border-radius: 4px;
      font-family: Menlo, Consolas, monaco, monospace;
      padding: 0.8em 1em;
    }

    .wp-block-embed figcaption {
      color: #555;
      font-size: 13px;
      text-align: center;
    }

    .is-dark-theme .wp-block-embed figcaption {
      color: hsla(0, 0%, 100%, 0.65);
    }

    .wp-block-embed {
      margin: 0 0 1em;
    }

    .blocks-gallery-caption {
      color: #555;
      font-size: 13px;
      text-align: center;
    }

    .is-dark-theme .blocks-gallery-caption {
      color: hsla(0, 0%, 100%, 0.65);
    }

    .wp-block-image figcaption {
      color: #555;
      font-size: 13px;
      text-align: center;
    }

    .is-dark-theme .wp-block-image figcaption {
      color: hsla(0, 0%, 100%, 0.65);
    }

    .wp-block-image {
      margin: 0 0 1em;
    }

    .wp-block-pullquote {
      border-bottom: 4px solid;
      border-top: 4px solid;
      color: currentColor;
      margin-bottom: 1.75em;
    }

    .wp-block-pullquote cite,
    .wp-block-pullquote footer,
    .wp-block-pullquote__citation {
      color: currentColor;
      font-size: 0.8125em;
      font-style: normal;
      text-transform: uppercase;
    }

    .wp-block-quote {
      border-left: 0.25em solid;
      margin: 0 0 1.75em;
      padding-left: 1em;
    }

    .wp-block-quote cite,
    .wp-block-quote footer {
      color: currentColor;
      font-size: 0.8125em;
      font-style: normal;
      position: relative;
    }

    .wp-block-quote.has-text-align-right {
      border-left: none;
      border-right: 0.25em solid;
      padding-left: 0;
      padding-right: 1em;
    }

    .wp-block-quote.has-text-align-center {
      border: none;
      padding-left: 0;
    }

    .wp-block-quote.is-large,
    .wp-block-quote.is-style-large,
    .wp-block-quote.is-style-plain {
      border: none;
    }

    .wp-block-search .wp-block-search__label {
      font-weight: 700;
    }

    .wp-block-search__button {
      border: 1px solid #ccc;
      padding: 0.375em 0.625em;
    }

    :where(.wp-block-group.has-background) {
      padding: 1.25em 2.375em;
    }

    .wp-block-separator.has-css-opacity {
      opacity: 0.4;
    }

    .wp-block-separator {
      border: none;
      border-bottom: 2px solid;
      margin-left: auto;
      margin-right: auto;
    }

    .wp-block-separator.has-alpha-channel-opacity {
      opacity: 1;
    }

    .wp-block-separator:not(.is-style-wide):not(.is-style-dots) {
      width: 100px;
    }

    .wp-block-separator.has-background:not(.is-style-dots) {
      border-bottom: none;
      height: 1px;
    }

    .wp-block-separator.has-background:not(.is-style-wide):not(.is-style-dots) {
      height: 2px;
    }

    .wp-block-table {
      margin: 0 0 1em;
    }

    .wp-block-table td,
    .wp-block-table th {
      word-break: normal;
    }

    .wp-block-table figcaption {
      color: #555;
      font-size: 13px;
      text-align: center;
    }

    .is-dark-theme .wp-block-table figcaption {
      color: hsla(0, 0%, 100%, 0.65);
    }

    .wp-block-video figcaption {
      color: #555;
      font-size: 13px;
      text-align: center;
    }

    .is-dark-theme .wp-block-video figcaption {
      color: hsla(0, 0%, 100%, 0.65);
    }

    .wp-block-video {
      margin: 0 0 1em;
    }

    .wp-block-template-part.has-background {
      margin-bottom: 0;
      margin-top: 0;
      padding: 1.25em 2.375em;
    }
  </style>
  <style id="classic-theme-styles-inline-css">
    /*! This file is auto-generated */
    .wp-block-button__link {
      color: #fff;
      background-color: #32373c;
      border-radius: 9999px;
      box-shadow: none;
      text-decoration: none;
      padding: calc(0.667em + 2px) calc(1.333em + 2px);
      font-size: 1.125em;
    }

    .wp-block-file__button {
      background: #32373c;
      color: #fff;
      text-decoration: none;
    }
  </style>
  <style id="global-styles-inline-css">
    body {
      --wp--preset--color--black: #000000;
      --wp--preset--color--cyan-bluish-gray: #abb8c3;
      --wp--preset--color--white: #ffffff;
      --wp--preset--color--pale-pink: #f78da7;
      --wp--preset--color--vivid-red: #cf2e2e;
      --wp--preset--color--luminous-vivid-orange: #ff6900;
      --wp--preset--color--luminous-vivid-amber: #fcb900;
      --wp--preset--color--light-green-cyan: #7bdcb5;
      --wp--preset--color--vivid-green-cyan: #00d084;
      --wp--preset--color--pale-cyan-blue: #8ed1fc;
      --wp--preset--color--vivid-cyan-blue: #0693e3;
      --wp--preset--color--vivid-purple: #9b51e0;
      --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg,
          rgba(6, 147, 227, 1) 0%,
          rgb(155, 81, 224) 100%);
      --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg,
          rgb(122, 220, 180) 0%,
          rgb(0, 208, 130) 100%);
      --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg,
          rgba(252, 185, 0, 1) 0%,
          rgba(255, 105, 0, 1) 100%);
      --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg,
          rgba(255, 105, 0, 1) 0%,
          rgb(207, 46, 46) 100%);
      --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg,
          rgb(238, 238, 238) 0%,
          rgb(169, 184, 195) 100%);
      --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg,
          rgb(74, 234, 220) 0%,
          rgb(151, 120, 209) 20%,
          rgb(207, 42, 186) 40%,
          rgb(238, 44, 130) 60%,
          rgb(251, 105, 98) 80%,
          rgb(254, 248, 76) 100%);
      --wp--preset--gradient--blush-light-purple: linear-gradient(135deg,
          rgb(255, 206, 236) 0%,
          rgb(152, 150, 240) 100%);
      --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg,
          rgb(254, 205, 165) 0%,
          rgb(254, 45, 45) 50%,
          rgb(107, 0, 62) 100%);
      --wp--preset--gradient--luminous-dusk: linear-gradient(135deg,
          rgb(255, 203, 112) 0%,
          rgb(199, 81, 192) 50%,
          rgb(65, 88, 208) 100%);
      --wp--preset--gradient--pale-ocean: linear-gradient(135deg,
          rgb(255, 245, 203) 0%,
          rgb(182, 227, 212) 50%,
          rgb(51, 167, 181) 100%);
      --wp--preset--gradient--electric-grass: linear-gradient(135deg,
          rgb(202, 248, 128) 0%,
          rgb(113, 206, 126) 100%);
      --wp--preset--gradient--midnight: linear-gradient(135deg,
          rgb(2, 3, 129) 0%,
          rgb(40, 116, 252) 100%);
      --wp--preset--font-size--small: 13px;
      --wp--preset--font-size--medium: 20px;
      --wp--preset--font-size--large: 36px;
      --wp--preset--font-size--x-large: 42px;
      --wp--preset--spacing--20: 0.44rem;
      --wp--preset--spacing--30: 0.67rem;
      --wp--preset--spacing--40: 1rem;
      --wp--preset--spacing--50: 1.5rem;
      --wp--preset--spacing--60: 2.25rem;
      --wp--preset--spacing--70: 3.38rem;
      --wp--preset--spacing--80: 5.06rem;
      --wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);
      --wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);
      --wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);
      --wp--preset--shadow--outlined: 6px 6px 0px -3px rgba(255, 255, 255, 1),
        6px 6px rgba(0, 0, 0, 1);
      --wp--preset--shadow--crisp: 6px 6px 0px rgba(0, 0, 0, 1);
    }

    :where(.is-layout-flex) {
      gap: 0.5em;
    }

    :where(.is-layout-grid) {
      gap: 0.5em;
    }

    body .is-layout-flow>.alignleft {
      float: left;
      margin-inline-start: 0;
      margin-inline-end: 2em;
    }

    body .is-layout-flow>.alignright {
      float: right;
      margin-inline-start: 2em;
      margin-inline-end: 0;
    }

    body .is-layout-flow>.aligncenter {
      margin-left: auto !important;
      margin-right: auto !important;
    }

    body .is-layout-constrained>.alignleft {
      float: left;
      margin-inline-start: 0;
      margin-inline-end: 2em;
    }

    body .is-layout-constrained>.alignright {
      float: right;
      margin-inline-start: 2em;
      margin-inline-end: 0;
    }

    body .is-layout-constrained>.aligncenter {
      margin-left: auto !important;
      margin-right: auto !important;
    }

    body .is-layout-constrained> :where(:not(.alignleft):not(.alignright):not(.alignfull)) {
      max-width: var(--wp--style--global--content-size);
      margin-left: auto !important;
      margin-right: auto !important;
    }

    body .is-layout-constrained>.alignwide {
      max-width: var(--wp--style--global--wide-size);
    }

    body .is-layout-flex {
      display: flex;
    }

    body .is-layout-flex {
      flex-wrap: wrap;
      align-items: center;
    }

    body .is-layout-flex>* {
      margin: 0;
    }

    body .is-layout-grid {
      display: grid;
    }

    body .is-layout-grid>* {
      margin: 0;
    }

    :where(.wp-block-columns.is-layout-flex) {
      gap: 2em;
    }

    :where(.wp-block-columns.is-layout-grid) {
      gap: 2em;
    }

    :where(.wp-block-post-template.is-layout-flex) {
      gap: 1.25em;
    }

    :where(.wp-block-post-template.is-layout-grid) {
      gap: 1.25em;
    }

    .has-black-color {
      color: var(--wp--preset--color--black) !important;
    }

    .has-cyan-bluish-gray-color {
      color: var(--wp--preset--color--cyan-bluish-gray) !important;
    }

    .has-white-color {
      color: var(--wp--preset--color--white) !important;
    }

    .has-pale-pink-color {
      color: var(--wp--preset--color--pale-pink) !important;
    }

    .has-vivid-red-color {
      color: var(--wp--preset--color--vivid-red) !important;
    }

    .has-luminous-vivid-orange-color {
      color: var(--wp--preset--color--luminous-vivid-orange) !important;
    }

    .has-luminous-vivid-amber-color {
      color: var(--wp--preset--color--luminous-vivid-amber) !important;
    }

    .has-light-green-cyan-color {
      color: var(--wp--preset--color--light-green-cyan) !important;
    }

    .has-vivid-green-cyan-color {
      color: var(--wp--preset--color--vivid-green-cyan) !important;
    }

    .has-pale-cyan-blue-color {
      color: var(--wp--preset--color--pale-cyan-blue) !important;
    }

    .has-vivid-cyan-blue-color {
      color: var(--wp--preset--color--vivid-cyan-blue) !important;
    }

    .has-vivid-purple-color {
      color: var(--wp--preset--color--vivid-purple) !important;
    }

    .has-black-background-color {
      background-color: var(--wp--preset--color--black) !important;
    }

    .has-cyan-bluish-gray-background-color {
      background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
    }

    .has-white-background-color {
      background-color: var(--wp--preset--color--white) !important;
    }

    .has-pale-pink-background-color {
      background-color: var(--wp--preset--color--pale-pink) !important;
    }

    .has-vivid-red-background-color {
      background-color: var(--wp--preset--color--vivid-red) !important;
    }

    .has-luminous-vivid-orange-background-color {
      background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
    }

    .has-luminous-vivid-amber-background-color {
      background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
    }

    .has-light-green-cyan-background-color {
      background-color: var(--wp--preset--color--light-green-cyan) !important;
    }

    .has-vivid-green-cyan-background-color {
      background-color: var(--wp--preset--color--vivid-green-cyan) !important;
    }

    .has-pale-cyan-blue-background-color {
      background-color: var(--wp--preset--color--pale-cyan-blue) !important;
    }

    .has-vivid-cyan-blue-background-color {
      background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
    }

    .has-vivid-purple-background-color {
      background-color: var(--wp--preset--color--vivid-purple) !important;
    }

    .has-black-border-color {
      border-color: var(--wp--preset--color--black) !important;
    }

    .has-cyan-bluish-gray-border-color {
      border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
    }

    .has-white-border-color {
      border-color: var(--wp--preset--color--white) !important;
    }

    .has-pale-pink-border-color {
      border-color: var(--wp--preset--color--pale-pink) !important;
    }

    .has-vivid-red-border-color {
      border-color: var(--wp--preset--color--vivid-red) !important;
    }

    .has-luminous-vivid-orange-border-color {
      border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
    }

    .has-luminous-vivid-amber-border-color {
      border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
    }

    .has-light-green-cyan-border-color {
      border-color: var(--wp--preset--color--light-green-cyan) !important;
    }

    .has-vivid-green-cyan-border-color {
      border-color: var(--wp--preset--color--vivid-green-cyan) !important;
    }

    .has-pale-cyan-blue-border-color {
      border-color: var(--wp--preset--color--pale-cyan-blue) !important;
    }

    .has-vivid-cyan-blue-border-color {
      border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
    }

    .has-vivid-purple-border-color {
      border-color: var(--wp--preset--color--vivid-purple) !important;
    }

    .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
      background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
    }

    .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
      background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
    }

    .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
      background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
    }

    .has-luminous-vivid-orange-to-vivid-red-gradient-background {
      background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
    }

    .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
      background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
    }

    .has-cool-to-warm-spectrum-gradient-background {
      background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
    }

    .has-blush-light-purple-gradient-background {
      background: var(--wp--preset--gradient--blush-light-purple) !important;
    }

    .has-blush-bordeaux-gradient-background {
      background: var(--wp--preset--gradient--blush-bordeaux) !important;
    }

    .has-luminous-dusk-gradient-background {
      background: var(--wp--preset--gradient--luminous-dusk) !important;
    }

    .has-pale-ocean-gradient-background {
      background: var(--wp--preset--gradient--pale-ocean) !important;
    }

    .has-electric-grass-gradient-background {
      background: var(--wp--preset--gradient--electric-grass) !important;
    }

    .has-midnight-gradient-background {
      background: var(--wp--preset--gradient--midnight) !important;
    }

    .has-small-font-size {
      font-size: var(--wp--preset--font-size--small) !important;
    }

    .has-medium-font-size {
      font-size: var(--wp--preset--font-size--medium) !important;
    }

    .has-large-font-size {
      font-size: var(--wp--preset--font-size--large) !important;
    }

    .has-x-large-font-size {
      font-size: var(--wp--preset--font-size--x-large) !important;
    }

    .wp-block-navigation a:where(:not(.wp-element-button)) {
      color: inherit;
    }

    :where(.wp-block-post-template.is-layout-flex) {
      gap: 1.25em;
    }

    :where(.wp-block-post-template.is-layout-grid) {
      gap: 1.25em;
    }

    :where(.wp-block-columns.is-layout-flex) {
      gap: 2em;
    }

    :where(.wp-block-columns.is-layout-grid) {
      gap: 2em;
    }

    .wp-block-pullquote {
      font-size: 1.5em;
      line-height: 1.6;
    }
  </style>
  <style id="woocommerce-inline-inline-css">
    .woocommerce form .form-row .required {
      visibility: visible;
    }
  </style>

  <link rel="stylesheet" id="redux-extendify-styles-css" href="../../../assets/wp-content/plugins/redux-framework/redux-core/assets/css/extendify-utilities.css?ver=4.4.9" media="all" />
  <link rel="stylesheet" id="contact-form-7-css" href="../../../assets/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=5.8.2" media="all" />
  <link rel="stylesheet" id="tutor-icon-css" href="../../../assets/wp-content/plugins/tutor/assets/css/tutor-icon.min.css?ver=2.4.0" media="all" />
  <link rel="stylesheet" id="tutor-css" href="../../../assets/wp-content/plugins/tutor/assets/css/tutor.min.css?ver=2.4.0" media="all" />
  <link rel="stylesheet" id="buttons-css" href="../../../assets/wp-includes/css/buttons.min.css?ver=6.4.1" media="all" />
  <link rel="stylesheet" id="dashicons-css" href="../../../assets/wp-includes/css/dashicons.min.css?ver=6.4.1" media="all" />
  <link rel="stylesheet" id="mediaelement-css" href="../../../assets/wp-includes/js/mediaelement/mediaelementplayer-legacy.min.css?ver=4.2.17" media="all" />
  <link rel="stylesheet" id="wp-mediaelement-css" href="../../../assets/wp-includes/js/mediaelement/wp-mediaelement.min.css?ver=6.4.1" media="all" />
  <link rel="stylesheet" id="media-views-css" href="../../../assets/wp-includes/css/media-views.min.css?ver=6.4.1" media="all" />
  <link rel="stylesheet" id="imgareaselect-css" href="../../../assets/wp-includes/js/imgareaselect/imgareaselect.css?ver=0.9.8" media="all" />
  <link rel="stylesheet" id="tutor-frontend-css" href="../../../assets/wp-content/plugins/tutor/assets/css/tutor-front.min.css?ver=2.4.0" media="all" />

  <link rel="stylesheet" id="tutor-frontend-dashboard-css-css" href="../../../assets/wp-content/plugins/tutor/assets/css/tutor-frontend-dashboard.min.css?ver=2.4.0" media="all" />
  <link rel="stylesheet" id="woocommerce-layout-css" href="../../../assets/wp-content/plugins/woocommerce/assets/css/woocommerce-layout.css?ver=8.2.2" media="all" />
  <link rel="stylesheet" id="woocommerce-smallscreen-css" href="../../../assets/wp-content/plugins/woocommerce/assets/css/woocommerce-smallscreen.css?ver=8.2.2" media="only screen and (max-width: 768px)" />
  <link rel="stylesheet" id="woocommerce-general-css" href="../../../assets/wp-content/plugins/woocommerce/assets/css/woocommerce.css?ver=8.2.2" media="all" />
  <style id="tutor-frontend-inline-css">
    .mce-notification.mce-notification-error {
      display: none !important;
    }

    :root {
      --tutor-color-primary: #00b769;
      --tutor-color-primary-rgb: 0, 183, 105;
      --tutor-color-primary-hover: #069f5f;
      --tutor-color-primary-hover-rgb: 6, 159, 95;
      --tutor-body-color: #212327;
      --tutor-body-color-rgb: 33, 35, 39;
      --tutor-border-color: #cdcfd5;
      --tutor-border-color-rgb: 205, 207, 213;
      --tutor-color-gray: #e3e5eb;
      --tutor-color-gray-rgb: 227, 229, 235;
    }
  </style>
  <link rel="stylesheet" id="mulish-font-css" href="//fonts.googleapis.com/css2?family=Mulish%3Awght%40300%3B400%3B500%3B600%3B700%3B800&#038;display=swap&#038;ver=6.4.1" media="all" />
  <link rel="stylesheet" id="bootstrap-css" href="../../../assets/wp-content/themes/edusion/assets/bootstrap/css/bootstrap.min.css?ver=6.4.1" media="all" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" id="font-awesome-css" href="../../../assets/wp-content/plugins/elementor/assets/lib/font-awesome/css/font-awesome.min.css?ver=4.7.0" media="all" />
  <link rel="stylesheet" id="themify-icons-css" href="../../../assets/wp-content/themes/edusion/assets/fonts/themify-icons.css?ver=6.4.1" media="all" />
  <link rel="stylesheet" id="owl-carousel-css" href="../../../assets/wp-content/themes/edusion/assets/owlcarousel/css/owl.carousel.css?ver=6.4.1" media="all" />
  <link rel="stylesheet" id="owl-theme-css" href="../../../assets/wp-content/themes/edusion/assets/owlcarousel/css/owl.theme.css?ver=6.4.1" media="all" />
  <link rel="stylesheet" id="slicknav-css" href="../../../assets/wp-content/themes/edusion/assets/css/slicknav.css?ver=6.4.1" media="all" />
  <link rel="stylesheet" id="magnific-popup-css" href="../../../assets/wp-content/themes/edusion/assets/css/magnific-popup.css?ver=6.4.1" media="all" />
  <link rel="stylesheet" id="animate-css" href="../../../assets/wp-content/themes/edusion/assets/css/animate.css?ver=6.4.1" media="all" />
  <link rel="stylesheet" id="edusion-main-style-css" href="../../../assets/wp-content/themes/edusion/assets/css/style.css?ver=6.4.1" media="all" />
  <link rel="stylesheet" id="edusion-responsive-css" href="../../../assets/wp-content/themes/edusion/assets/css/responsive.css?ver=6.4.1" media="all" />
  <link rel="stylesheet" id="edusion-style-css" href="../../../assets/wp-content/themes/edusion/style.css?ver=1.0.0" media="all" />
  <link rel="stylesheet" id="addtoany-css" href="../../../assets/wp-content/plugins/add-to-any/addtoany.min.css?ver=1.16" media="all" />

  <script async src="https://static.addtoany.com/menu/page.js" id="addtoany-core-js"></script>
  <script src="../../../assets/wp-includes/js/jquery/jquery.min.js?ver=3.7.1" id="jquery-core-js"></script>
  <script src="../../../assets/wp-includes/js/jquery/jquery-migrate.min.js?ver=3.4.1" id="jquery-migrate-js"></script>
  <script async src="../../../assets/wp-content/plugins/add-to-any/addtoany.min.js?ver=1.1" id="addtoany-jquery-js"></script>

  <script src="../../../assets/wp-includes/js/utils.min.js?ver=6.4.1" id="utils-js"></script>
  <script src="../../../assets/wp-includes/js/plupload/moxie.min.js?ver=1.3.5" id="moxiejs-js"></script>
  <script src="../../../assets/wp-includes/js/plupload/plupload.min.js?ver=2.1.9" id="plupload-js"></script>

  <script>
    function setREVStartSize(e) {
      //window.requestAnimationFrame(function() {
      window.RSIW =
        window.RSIW === undefined ? window.innerWidth : window.RSIW;
      window.RSIH =
        window.RSIH === undefined ? window.innerHeight : window.RSIH;
      try {
        var pw = document.getElementById(e.c).parentNode.offsetWidth,
          newh;
        pw =
          pw === 0 ||
          isNaN(pw) ||
          e.l == "fullwidth" ||
          e.layout == "fullwidth" ?
          window.RSIW :
          pw;
        e.tabw = e.tabw === undefined ? 0 : parseInt(e.tabw);
        e.thumbw = e.thumbw === undefined ? 0 : parseInt(e.thumbw);
        e.tabh = e.tabh === undefined ? 0 : parseInt(e.tabh);
        e.thumbh = e.thumbh === undefined ? 0 : parseInt(e.thumbh);
        e.tabhide = e.tabhide === undefined ? 0 : parseInt(e.tabhide);
        e.thumbhide = e.thumbhide === undefined ? 0 : parseInt(e.thumbhide);
        e.mh =
          e.mh === undefined || e.mh == "" || e.mh === "auto" ?
          0 :
          parseInt(e.mh, 0);
        if (e.layout === "fullscreen" || e.l === "fullscreen")
          newh = Math.max(e.mh, window.RSIH);
        else {
          e.gw = Array.isArray(e.gw) ? e.gw : [e.gw];
          for (var i in e.rl)
            if (e.gw[i] === undefined || e.gw[i] === 0) e.gw[i] = e.gw[i - 1];
          e.gh =
            e.el === undefined ||
            e.el === "" ||
            (Array.isArray(e.el) && e.el.length == 0) ?
            e.gh :
            e.el;
          e.gh = Array.isArray(e.gh) ? e.gh : [e.gh];
          for (var i in e.rl)
            if (e.gh[i] === undefined || e.gh[i] === 0) e.gh[i] = e.gh[i - 1];

          var nl = new Array(e.rl.length),
            ix = 0,
            sl;
          e.tabw = e.tabhide >= pw ? 0 : e.tabw;
          e.thumbw = e.thumbhide >= pw ? 0 : e.thumbw;
          e.tabh = e.tabhide >= pw ? 0 : e.tabh;
          e.thumbh = e.thumbhide >= pw ? 0 : e.thumbh;
          for (var i in e.rl) nl[i] = e.rl[i] < window.RSIW ? 0 : e.rl[i];
          sl = nl[0];
          for (var i in nl)
            if (sl > nl[i] && nl[i] > 0) {
              sl = nl[i];
              ix = i;
            }
          var m =
            pw > e.gw[ix] + e.tabw + e.thumbw ?
            1 :
            (pw - (e.tabw + e.thumbw)) / e.gw[ix];
          newh = e.gh[ix] * m + (e.tabh + e.thumbh);
        }
        var el = document.getElementById(e.c);
        if (el !== null && el) el.style.height = newh + "px";
        el = document.getElementById(e.c + "_wrapper");
        if (el !== null && el) {
          el.style.height = newh + "px";
          el.style.display = "block";
        }
      } catch (e) {
        console.log("Failure at Presize of Slider:" + e);
      }
      //});
    }
  </script>
    <link href="../../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">

    
</head>