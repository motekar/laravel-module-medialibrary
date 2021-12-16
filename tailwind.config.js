module.exports = {
    content: ["./Resources/views/**/*.blade.php"],

    theme: {
        extend: {
            gridTemplateColumns: {
                auto: "repeat(auto-fit, minmax(240px, 1fr))",
            },
        },
    },

    plugins: [require("@tailwindcss/line-clamp")],
};
