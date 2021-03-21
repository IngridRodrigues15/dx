

<div class="modal fade" id="editAnswerModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Editar pergunta</h4>
            </div>
            <div class="modal-body">
                <div class="questionForm">
                    <input type="hidden" id="editQuestionId" name="questionId">
                    <label for="question">Pergunta</label>
                    <textarea type="text" id="editQuestionText" name="question" placeholder="Pergunta"></textarea>
                    <div class="editAnswerList">
                        
                    </div>
                    
                    <button id="editAnswers">Editar</button><br/><br/>
                </div>
            </div>
        </div>
    </div>
</div>