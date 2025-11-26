<?php  
// load file câu hỏi

$quizFile = fopen('Quiz.txt', 'r') or die ("Lỗi mở file");
$content = fread($quizFile, filesize("Quiz.txt"));
fclose($quizFile);
echo nl2br($content);
// 👉 Hàm nl2br() sẽ chuyển \n → <br> cho HTML hiểu.
?>