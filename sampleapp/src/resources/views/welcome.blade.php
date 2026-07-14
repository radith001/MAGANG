<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Sistem Informasi Manajemen Gangguan Pelanggan BRS NET</title>
    <meta name="description" content="Laporkan gangguan internet dan pantau status perbaikan jaringan BRS NET secara cepat dan transparan.">
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "on-tertiary-fixed-variant": "#920600",
                        "outline-variant": "#c5c5da",
                        "surface-container-low": "#f2f4f6",
                        "error-container": "#ffdad6",
                        "on-secondary-fixed-variant": "#783200",
                        "secondary-fixed-dim": "#ffb690",
                        "on-primary-fixed-variant": "#001ce0",
                        "on-secondary-container": "#5f2600",
                        "on-error-container": "#93000a",
                        "on-tertiary-fixed": "#400100",
                        "on-secondary": "#ffffff",
                        "outline": "#757689",
                        "on-surface-variant": "#444557",
                        "on-tertiary-container": "#ffaa9c",
                        "surface-container": "#eceef0",
                        "on-tertiary": "#ffffff",
                        "secondary-fixed": "#ffdbca",
                        "on-primary": "#ffffff",
                        "on-primary-container": "#b5bbff",
                        "surface-tint": "#2b3fff",
                        "surface-variant": "#e0e3e5",
                        "secondary": "#9d4400",
                        "inverse-surface": "#2d3133",
                        "surface-dim": "#d8dadc",
                        "error": "#ba1a1a",
                        "on-primary-fixed": "#000766",
                        "on-background": "#191c1e",
                        "inverse-on-surface": "#eff1f3",
                        "background": "#f7f9fb",
                        "surface-container-high": "#e6e8ea",
                        "secondary-container": "#ff7a21",
                        "primary": "#0015b5",
                        "surface-container-highest": "#e0e3e5",
                        "surface-bright": "#f7f9fb",
                        "on-secondary-fixed": "#331100",
                        "tertiary-fixed-dim": "#ffb4a7",
                        "on-surface": "#191c1e",
                        "tertiary-fixed": "#ffdad4",
                        "primary-container": "#0020f5",
                        "surface": "#f7f9fb",
                        "tertiary-container": "#a00700",
                        "surface-container-lowest": "#ffffff",
                        "tertiary": "#750400",
                        "on-error": "#ffffff",
                        "primary-fixed": "#dfe0ff",
                        "primary-fixed-dim": "#bdc2ff",
                        "inverse-primary": "#bdc2ff"
                    },
                    borderRadius: {
                        DEFAULT: "0.25rem",
                        lg: "0.5rem",
                        xl: "0.75rem",
                        full: "9999px"
                    },
                    spacing: {
                        xl: "64px",
                        gutter: "24px",
                        base: "4px",
                        md: "24px",
                        xs: "8px",
                        "container-max": "1280px",
                        sm: "16px",
                        lg: "40px"
                    },
                    fontFamily: {
                        "body-md": ["Inter"],
                        "display-lg": ["Hanken Grotesk"],
                        "headline-lg-mobile": ["Hanken Grotesk"],
                        "headline-lg": ["Hanken Grotesk"],
                        "code-xs": ["Inter"],
                        "title-md": ["Hanken Grotesk"],
                        "body-lg": ["Inter"],
                        "label-sm": ["Inter"]
                    },
                    fontSize: {
                        "body-md": ["16px", { lineHeight: "24px", fontWeight: "400" }],
                        "display-lg": ["48px", { lineHeight: "56px", letterSpacing: "-0.02em", fontWeight: "700" }],
                        "headline-lg-mobile": ["24px", { lineHeight: "32px", fontWeight: "600" }],
                        "headline-lg": ["32px", { lineHeight: "40px", letterSpacing: "-0.01em", fontWeight: "600" }],
                        "code-xs": ["12px", { lineHeight: "16px", letterSpacing: "0.05em", fontWeight: "600" }],
                        "title-md": ["20px", { lineHeight: "28px", fontWeight: "600" }],
                        "body-lg": ["18px", { lineHeight: "28px", fontWeight: "400" }],
                        "label-sm": ["14px", { lineHeight: "20px", letterSpacing: "0.01em", fontWeight: "500" }]
                    }
                }
            }
        }
    </script>
    <style>
        html { scroll-behavior: smooth; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .soft-lift { box-shadow: 0 4px 6px -1px rgba(0,21,181,0.05), 0 2px 4px -1px rgba(0,21,181,0.03); }
        .soft-lift-hover:hover { box-shadow: 0 10px 15px -3px rgba(0,21,181,0.08), 0 4px 6px -2px rgba(0,21,181,0.04); transform: translateY(-2px); }
        .glass-panel { background: rgba(255,255,255,0.95); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); }
        .nav-link-active { color: #0015b5 !important; font-weight: 700; border-bottom: 2px solid #0015b5; padding-bottom: 2px; }
        @keyframes fadeInDown { from { opacity:0; transform:translateY(-16px); } to { opacity:1; transform:translateY(0); } }
        .animate-fade-in-down { animation: fadeInDown 0.4s ease both; }
    </style>
    @livewireStyles
</head>
<body class="bg-background text-on-background font-body-md min-h-screen flex flex-col">
    {{ $slot }}
    @livewireScripts
</body>
</html>
