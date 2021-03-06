const primaryColors = require("@left4code/tw-starter/dist/js/colors");

module.exports = {
    purge: [
        "./src/**/*.php",
        "./src/**/*.html",
        "./src/**/*.vue",
        "./resources/**/*.php",
        "./resources/**/*.html",
        "./node_modules/@left4code/tw-starter/**/*.js",
    ],
    darkMode: "class",
    theme: {
        borderColor: (theme) => ({
            ...theme("colors"),
            DEFAULT: primaryColors.gray["300"],
        }),
        extend: {
            colors: {
                ...primaryColors,
                theme: {
                    1: "#cf5423",
                    2: "#F1F5F8",
                    3: "#ec7f30",
                    4: "#d76030",
                    5: "#DEE7EF",
                    6: "#D32929",
                    7: "#365A74",
                    8: "#D2DFEA",
                    9: "#91C714",
                    10: "#FF0000",
                    11: "#F78B00",
                    12: "#FBC500",
                    13: "#7F9EB9",
                    14: "#E6F3FF",
                    15: "#8DA9BE",
                    16: "#607F96",
                    17: "#FFEFD9",
                    18: "#D8F8BC",
                    19: "#2449AF",
                    20: "#FF0000",
                    21: "#C6D4FD",
                    22: "#E8EEFF",
                    23: "#b54a1e",
                    24: "#ec7f30",
                    25: "#f3d8c9",
                    26: "#b54415",
                    27: "#cf5423",
                    28: "#BBC8FD",
                    29: "#ec7f30",
                    30: "#98AFF5",
                },
            },
            fontFamily: {
                roboto: ["Roboto"],
            },
            container: {
                center: true,
            },
            maxWidth: {
                "1/4": "25%",
                "1/2": "50%",
                "3/4": "75%",
            },
            screens: {
                sm: "640px",
                md: "768px",
                lg: "1024px",
                xl: "1280px",
                xxl: "1600px",
            },
            strokeWidth: {
                0.5: 0.5,
                1.5: 1.5,
                2.5: 2.5,
            },
        },
        aspectRatio: {
            none: 0,
            square: [1, 1],
            "16/9": [16, 9],
            "4/3": [4, 3],
            "21/9": [21, 9]
        }
    },
    variants: {
        extend: {
            zIndex: ["responsive", "hover"],
            position: ["responsive", "hover"],
            padding: ["responsive", "last"],
            margin: ["responsive", "last"],
            borderWidth: ["responsive", "last"],
            backgroundColor: [
                "last",
                "first",
                "odd",
                "responsive",
                "hover",
                "dark",
            ],
            borderColor: [
                "last",
                "first",
                "odd",
                "responsive",
                "hover",
                "dark",
            ],
            textColor: ["last", "first", "odd", "responsive", "hover", "dark"],
            boxShadow: ["last", "first", "odd", "responsive", "hover", "dark"],
            borderOpacity: [
                "last",
                "first",
                "odd",
                "responsive",
                "hover",
                "dark",
            ],
            backgroundOpacity: [
                "last",
                "first",
                "odd",
                "responsive",
                "hover",
                "dark",
            ],
        },
        aspectRatio: ['responsive']
    },
    plugins: [
        require("tailwindcss-responsive-embed"),
        require("tailwindcss-aspect-ratio"),
    ]
};
