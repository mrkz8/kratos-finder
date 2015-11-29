# Require any additional compass plugins here.

# Set this to the root of your project when deployed:
http_path = "/"
css_dir = "./public/css"
sass_dir = "scss"
images_dir = "./public/img"
javascripts_dir = "./public/js"
fonts_dir = "./public/css/fonts"

#output_style = :expanded
#output_style = :nested
#output_style = :compressed
# or :nested or :compact or :compressed
output_style = (environment == :production) ? :compressed : :expanded

#environment = :production
environment = :production

# To enable relative paths to assets via compass helper functions. Uncomment:
relative_assets = true

color_output = false

preferred_syntax = :scss
