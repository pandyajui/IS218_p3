function edit_question(question_id){
  window.location.href='edit_question.php?qid=' + question_id;
}

function delete_question(question_id){
  window.location.href='../control/delete_question.php?qid=' + question_id;
}