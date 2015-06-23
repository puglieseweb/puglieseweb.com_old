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

HTML_FILE="index.php"
ROOT="."
i=0
temp=0


# ===================================================
# HTML CODE
# ===================================================
printHeader(){

cat <<EOF
	<?php 
	\$title = "Emanuele Pugliese's Web reference";
	\$keywords = "Emanuele Pugliese, programming notes, index";
	\$description = "Emanuele Pugliese's notes index";
	include (\$_SERVER["DOCUMENT_ROOT"].'/includes/master-head.inc.php'); 
	
	?>
EOF
	echo "<article id=\"index\">"
	echo "<section class=\"title\">"
	echo "<section>"
	echo "<h2>Index</h2>"
}

printFooter(){
	echo "</section>"
	echo "</section>"
	echo "</article>"
	echo "<?php include (\$_SERVER["DOCUMENT_ROOT"].'/includes/master-foot.inc.php'); ?>"
}

# ===================================================
# Logic for HTML Index links
# ===================================================

createSection(){         # expected a string as a parameter indicatin the name of the section
        folder=$1
        sectionName=`basename $folder .php | sed 's/./\u&/'`
		if [ -z `echo $folder | cut -d/ -f3` ]; then
			echo -e "\n\t</section>"
			echo -e "\n</section>"
			echo -e "\n<section>"
			echo -e "\n\t<section class=\"title2\">"
			echo -e "\n\t\t<h3>$sectionName</h3>"
			
			echo -e "\n\t</section>"
			echo -e "\n\t<section>"
		else
        	echo -e "\n\t</section>"
			echo -e "\n\t<section>"
			echo -e "\t\t<h4>$sectionName:</h4>"
		fi

}


findHtml(){   # expected a relative path as an argument
        path=$1
        find $path -maxdepth 1 -regex ".*\(php\|html\|htm\)$" | while read path ; do
                link_name=`basename $path .html`
		path="/`echo $path | cut -d / -f2-`"
		link=`echo $path | cut -d . -f1`
                echo -e "\t\t<a\x20href='$link'>`basename $link_name .php | sed 's/./\u&/'`</a><br\x20/>"
        done
}
createSummary(){

       # if [[ $i -eq  0 ]]; then
       # 	echo "<section>"
       # fi

        for folder in $@; do                                                            # for each folder in the root
            if [ -d $folder ]; then                                                 # if a folder is a directory
                if [ $folder != $ROOT ]; then                                     # do not print the root folder
    				if [ $(findHtml $folder| wc -l) -ne 0 ]; then           # do not print the folders that do not contain html file
                            createSection $folder
                            findHtml $folder
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
echo -e "be created/updated in the current directidory:\n"
echo -e "\t `pwd`\n"


# validation inputed paramets:
#if no argument then ask a question
if [ "$1" != "-f" ]
then
	read -n 1 -p  "Do you want to  continue (y/n)? "
	[ "$REPLY" == "n" ] && clear
	[ "$REPLY" == "n" ] && exit
fi


# ------------ HTML CREATION FILE -----------

if [ ! -f $HTML_FILE  ]; then
        echo -e "\n\nNew \"$HTML_FILE\" created!"
else
        rm ./$HTML_FILE
        echo -e "\n\nFile \"$HTML_FILE\" updated!"
fi

printHeader >$HTML_FILE
createSummary $ROOT  >>$HTML_FILE
printFooter >>$HTML_FILE

# ------------ CSS CREATION FILE -----------

# if [ ! -f $CSS_FILE ]; then
#         echo -e "\nNew \"$CSS_FILE\" created!\n"
# else
#         rm ./$CSS_FILE
#         echo -e "\nFile \"$CSS_FILE\" updated!\n"
# fi
#
# printCss >>$CSS_FILE

sleep 1

#End program :)
