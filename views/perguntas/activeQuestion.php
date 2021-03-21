<div class="modal fade" id="activeAnswerModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Pergunta</h4>
            </div>
   
            <div class="modal-body">
                <div class="questionForm">
                    <input type="hidden" id="activeQuestionId" name="questionId">
                    <div id="activeQuestionText"></div>
                    
                    <div class="alert alert-info hide">
                        A pergunta ainda não foi respondida.
                    </div>

                    <div class="activeAnswerList">
                    </div>
                    
                    <button id="answerQuestion">Ok</button><br/><br/>
                </div>
            </div>
        </div>
    </div>
</div>