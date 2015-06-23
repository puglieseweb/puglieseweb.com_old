#!/bin/bash
#
# This is generateHtmlIndex.sh
# https://github.com/puglieseweb/bash_scripting/blob/master/website_index_generator/generateHtmlIndex.sh
#
# This script should be placed into a root folder of a web site.
# The script generates an index page (\"$HTML_FILE\") taking into
# account all the *.html files located into the subfolders of the
# current working directory.
#
# Author: Emanuele Pugliese
# Author: Albert Liarte Cano

# Date: 01/08/2011

CSS_FILE="stylesheet.css"
HTML_FILE="index.html"


# ===================================================
# CSS CODE
# ===================================================
printCss(){
echo -e "/* AUTO GENERATED CODE */
body {
	line-height: 1;
	color: black;
	background: white;
	font-size: 1em; 
	background: black url(css/images/background.jpg) no-repeat scroll center 0px;
}

.section {
	width: 42%;
	margin: 1em 3% 1em 2.5%;
	float: left;
	border-style: solid;
	border-width: thin;
	border-color: #bfbfbf;
	-webkit-border-radius: .3em;
	-moz-border-radius: .3em;
	border-radius: .3em;
	padding: 0 .5em;
	background-color: #d5d5d5;
	box-shadow: 2px 2px 2px #bbb;
	-webkit-box-shadow: 1px 1px 1px #ccc;
	-moz-box-shadow: 2px 2px 2px #bbb;
	text-shadow: 1px 1px 1px #ddd; 
	-webkit-transition: background .5s;
	min-height: 10em
}

.section:hover {
	background-color: #cbcbcb; 
}
"
}

# ===================================================
# HTML CODE
# ===================================================
printHeader(){
        echo '<!DOCTYPE html>'
        echo '<html>'
        echo '<head>'
        echo -e '\t <title>Auto generated HTML index page</title>'
        echo -e '\t <link rel="stylesheet" type="text/css" href="'$CSS_FILE'">'
        echo -e '\t <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">'
        echo '</head>'
        echo '<body>'
        echo -e "\t<h1>Index page</h1>"
}

printFooter(){
        echo '</body>'
        echo '</html>'
}

# ===================================================
# Logic for HTML Index links
# ===================================================

startSection(){         # expected a string as a parameter indicatin the name of the section
        echo -e "\n\t<div class='section'>"
        echo -e "\t\t<h2>`basename $1 .html | sed 's/./\u&/'` Section</h2>"
}

endSection(){
        echo -e "\t</div>"
}

findHtml(){   # expected a relative path as an argument
        path=$1
        find $path -maxdepth 1 -regex ".*\(html\|htm\)$" | while read path ; do
                link_name=`basename $path .html`
		path="`echo $path | cut -d / -f2-`"
                echo -e "\t\t<a\x20href='$path'>$link_name</a><br\x20/>"
        done
}
createSummary(){
        for folder in $@; do                                                            # for each folder in the root
                if [ -d $folder ]; then                                                 # if a folder is a directory
                        if [ $folder != "." ]; then                                     # do not print the root folder
                                if [ $(findHtml $folder| wc -l) -ne 0 ]; then           # do not print the folders that do not contain html file
                                        startSection $folder
                                        findHtml $folder
                                        endSection
                                fi
                        fi
                        createSummary `find $folder -maxdepth 1 -type d | sed '1d'`     # recusive call to this function
                fi
        done
}


# *************************************************
#  ***************** Entry point *****************
# *************************************************
clear

# ------------ THIS SCRIPT INFORMATION MESSAGE -----------

echo -e "\nSCRIPT INFORMATION:\n"
echo -e "\tThis script should be placed into a root folder of a web site."
echo -e "\tThe script generates an index page (\"$HTML_FILE\") taking into "
echo -e "\taccount all the *.html files located into the subfolders of the "
echo -e "\tcurrent working directory.\n"
echo -e "\tEach folder is considered as a div with class=\"section\" css rule."
echo -e "\tBoth the root folder and folders not containing HTML files are "
echo -e "\tnot taken into accout.\n\n"

echo -e "An \"$HTML_FILE\" file and a related \"$CSS_FILE\" file are going to"
echo -e "be created/updated in the current directory:\n"
echo -e "\t `pwd`\n"

read -n 1 -p  "Do you want to  continue (y/n)? "
[ "$REPLY" == "n" ] && clear
[ "$REPLY" == "n" ] && exit

# ------------ HTML CREATION FILE -----------

if [ ! -f $HTML_FILE ]; then
        echo -e "\n\nNew \"$HTML_FILE\" created!"
else
        rm ./$HTML_FILE
        echo -e "\n\nFile \"$HTML_FILE\" updated!"
fi

printHeader >$HTML_FILE
createSummary "."  >>$HTML_FILE
printFooter >>$HTML_FILE

# ------------ CSS CREATION FILE -----------

if [ ! -f $CSS_FILE ]; then
        echo -e "\nNew \"$CSS_FILE\" created!\n"
else
        rm ./$CSS_FILE
        echo -e "\nFile \"$CSS_FILE\" updated!\n"
fi

printCss >>$CSS_FILE

sleep 1

#End program :)