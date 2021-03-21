

<div class="modal fade" id="NewAnswerModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Nova pergunta</h4>
            </div>
            <div class="modal-body">
                <div class="questionForm">
                    <input type="hidden" id="questionId" name="questionId">
                    <label for="question">Pergunta</label>
                    <textarea type="text" id="question" name="question" placeholder="Pergunta"></textarea>
                    <div class="newAnswerList">
                        <div class="answerCheckbox">
                            <input type="radio" name="rightAnswer" value=""><input type="text" name="answer" placeholder="opção 1" value="">
                        </div>
                        <div class="answerCheckbox">
                            <input type="radio" name="rightAnswer" value=""> <input type="text" name="answer" placeholder="opção 2" value="">
                        </div>
                        <div class="answerCheckbox">
                            <input type="radio" name="rightAnswer" value=""> <input type="text" name="answer" placeholder="opção 3" value="">
                        </div>
                        <div class="answerCheckbox">
                            <input type="radio" name="rightAnswer" value=""><input type="text" name="answer" placeholder="opção 4" value="">
                        </div>
                        <div class="answerCheckbox">
                            <input type="radio" name="rightAnswer" value=""> <input type="text" name="answer" placeholder="opção 5" value="">
                        </div>
                    </div>
                    
                    <button id="createQuestion" data-dismiss="modal" aria-label="Close">Ok</button><br/><br/>
                </div>
            </div>
        </div>
    </div>
</div>