module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],
    darkMode: "class", // or 'media' or 'class'
    theme: {
        screens: {
            sm: "640px",
            md: "768px",
            lg: "1024px",
            xl: "1280px",
        },
        container: {
            center: true,
            // padding: '1rem',
        },
        extend: {
            colors: {
                primary: {
                    50: "rgb(240, 249, 255)",
                    100: "rgb(224, 242, 254)",
                    200: "rgb(186, 230, 253)",
                    300: "rgb(125, 211, 252)",
                    400: "rgb(56, 189, 248)",
                    500: "rgb(14, 165, 233)",
                    600: "rgb(2, 132, 199)",
                    700: "rgb(3, 105, 161)",
                    800: "rgb(7, 89, 133)",
                    900: "rgb(12, 74, 110)",
                },
            },
            fontFamily: {
                poppins: "'Poppins', sans-serif",
                roboto: "'Roboto', sans-serif",
            },
        },
    },
    variants: {
        extend: {
            visibility: ["group-hover"],
            display: ["group-hover"],
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/aspect-ratio"),
    ],
};
