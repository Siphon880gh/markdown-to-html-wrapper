<?php
    $filepath = $_GET['filepath'] ?? "";
    $imagepath = $_GET['imagepath'] ?? "";

    if(strlen($filepath)===0) {
        echo "Make sure to have filepath= in url search params.";
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes</title>
    <script>
        const filepath = "<?php echo $filepath; ?>";
        const imagepath = "<?php echo $imagepath; ?>";
    </script>

    <link href="//cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        img {
            display: block;
            margin: 0 auto;
        }
        body {
            text-align: center;
        }
        #toc-toggler {
            cursor: pointer;
            position: fixed;
            top: 0;
            right: 20px;
        }
        
        #toc {
            display: none;
            position: fixed;
            top: 20px;
            right: 0;
            background-color: white;
        }
        
        #toc-toggler:hover #toc {
            display: block;
        }
        
        #mobile-tap.active+#toc {
            display: block;
        }
        
        .h2 {
            margin-left: 2ch;
        }
        
        .h2::before {
            content: "•\00a0";
        }
        
        .h3 {
            margin-left: 4ch;
        }
        
        .h3::before {
            content: "—";
        }
        
        .h4 {
            margin-left: 6ch;
        }
        
        .h4::before {
            content: "➣";
        }
        
        .h5 {
            margin-left: 8ch;
        }
        
        .h5::before {
            content: "➨";
        }
        
        .h6 {
            margin-left: 10ch;
        }
        
        .h6::before {
            content: "◦\00a0";
        }
        p {
            margin-bottom: 1.5em; /* This creates double line spacing between paragraphs */
        }
        img {
            max-height: 600px;
        }
    </style>

    <style>
    ul {
        list-style-type: none;
        padding-left: 1.25rem;
    }

    ol {
        list-style-type: decimal;
        padding-left: 1.25rem;
        display: table;
        margin: 0 auto;
    }
    ul > li::before {
        content: "•\00a0";
    }
    table {
        margin: 0 auto;
    }
    </style>
</head>

<body onclick="if(!event.target.matches('#mobile-tap')) { document.querySelector('#mobile-tap').classList.remove('active'); }">
    <div id="toc-toggler">
        <div id="mobile-tap" onclick="event.target.classList.toggle('active')">📖</div>
        <div id="toc"></div>
    </div>

    <h1 class="text-4xl font-bold text-center"><?php 
        $filename = substr($filepath, strpos($filepath, '/') + 1);
        echo substr($filename, 0, strrpos($filename, '.'));
    ?></h1>

    <div class="container text-2xl"></div>

    <script src="https://cdn.jsdelivr.net/npm/markdown-it@13.0.1/dist/markdown-it.min.js"></script>
    <script>
        function htmlTableOfContents(elNode) {
            var toc = document.getElementById("toc");
            var headings = [].slice.call(elNode.querySelectorAll('h1, h2, h3, h4, h5, h6'));

            headings.forEach(function(heading, i) {
                var ref = "toc" + i;
                if (heading.hasAttribute("id"))
                    ref = heading.getAttribute("id");
                else
                    heading.setAttribute("id", ref);

                var link = document.createElement("a");
                link.setAttribute("href", "#" + ref);
                link.textContent = heading.textContent;

                var div = document.createElement("div");
                div.classList.add(heading.tagName.toLowerCase());
                link.addEventListener("click", (event) => {
                    document.querySelector('#mobile-tap').classList.remove('active')
                })
                div.appendChild(link);
                toc.appendChild(div);
            });
        }
        fetch(filepath, {
                cache: "no-cache"
            }).then(response => response.text())
            .then(myMarkdown => {
                var md = window.markdownit({
                    html: true,
                    linkify: true
                });
                
                
                var result = md.render(myMarkdown);
                result = result.replace(/!\[\[(.*?)\]\]/g, function(match, filename) {
                    return `<img src="${imagepath}/${filename}" alt="${filename}">`;
                });
                document.querySelector(".container").innerHTML = result;
                htmlTableOfContents(document.querySelector(".container"))
            });
    </script>
</body>

</html>