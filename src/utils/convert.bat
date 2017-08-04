@ECHO OFF

REM
REM Convert .docx, .doc, .odt files into a .md file thanks to pandoc
REM

cls

REM  For /R ==> Loop in all folders

REM  %%~d will give the drive letter (c:)
REM  %%~p will give the folder name (\folder\subfolder\)
REM  %%~n will give the filename without the extension (filename)
REM  For more, see https://stackoverflow.com/a/3215539

For /R %%f in (*.doc *.docx *.odt) DO (

   pandoc -w markdown_github -o "%%~df%%~pf%%~nf.md" "%%f"
)