window.onload = function() {
    
    // *******************    ALERT POP-UP    *******************

    var popUp = document.getElementById("pop-up");
    var popUpCloseBtn = document.getElementById("pop-up--exit");

    setTimeout(function() {
        popUp.classList.add("pop-up--show");
    }, 700);

    popUpCloseBtn.onclick = function() {
        popUp.classList.remove("pop-up--show");
    }

    // *******************    SHOW / HIDE JUDGE SECTION - TOGGLE REQUIRED    *******************

    var judge = document.getElementById("judge");
    var showJudge = document.getElementById("delegate-judge-yes");
    var hideJudge = document.getElementById("delegate-judge-no");   

    var judgeInput = judge.getElementsByTagName("input");
    var judgeSelect = judge.getElementsByTagName("select");

    if (judge.style.display = "none") {
        for (var i=0; i < judgeInput.length; i++) {
            judgeInput[i].toggleAttribute("required", false);
        }
        for (var i=0; i < judgeSelect.length; i++) {
            judgeSelect[i].toggleAttribute("required", false);
        }
    }

    showJudge.onclick = function() {
        judge.style.display = "block";
        for (var i=0; i < judgeInput.length; i++) {
            judgeInput[i].toggleAttribute("required", true);
        }
        for (var i=0; i < judgeSelect.length; i++) {
            judgeSelect[i].toggleAttribute("required", true);
        }
    }

    hideJudge.onclick = function() {
        judge.style.display = "none";
        for (var i=0; i < judgeInput.length; i++) {
            judgeInput[i].toggleAttribute("required", false);
        }
        for (var i=0; i < judgeSelect.length; i++) {
            judgeSelect[i].toggleAttribute("required", false);
        }
    }

    // *******************    ADD / REMOVE COMPETITOR SECTION - TOGGLE REQUIRED    *******************

    // *******************    COMPETITOR 2    *******************

    var competitor2 = document.getElementById("competitor2");
    var addCompetitor2 = document.getElementById("add-competitor1");
    var removeCompetitor2 = document.getElementById("remove-competitor1");

    var competitorInput2 = competitor2.getElementsByTagName("input");
    var competitorSelect2 = competitor2.getElementsByTagName("select");

    if (competitor2.style.display = "none") {
        for (var i=0; i < 3; i++) {
            competitorInput2[i].toggleAttribute("required", false);
        }
        for (var i=0; i < competitorSelect2.length; i++) {
            competitorSelect2[i].toggleAttribute("required", false);
        }
    }

    addCompetitor2.onclick = function() {
        competitor2.style.display = "block";
        for (var i=0; i < 3; i++) {
            competitorInput2[i].toggleAttribute("required", true);
        }
        for (var i=0; i < competitorSelect2.length; i++) {
            competitorSelect2[i].toggleAttribute("required", true);
        }
    }

    removeCompetitor2.onclick = function() {
        competitor2.style.display = "none";
        for (var i=0; i < 3; i++) {
            competitorInput2[i].toggleAttribute("required", false);
        }
        for (var i=0; i < competitorSelect2.length; i++) {
            competitorSelect2[i].toggleAttribute("required", false);
        }
    }

    // *******************    COMPETITOR 3    *******************

    var competitor3 = document.getElementById("competitor3");
    var addCompetitor3 = document.getElementById("add-competitor2");
    var removeCompetitor3 = document.getElementById("remove-competitor2");

    var competitorInput3 = competitor3.getElementsByTagName("input");
    var competitorSelect3 = competitor3.getElementsByTagName("select");

    if (competitor3.style.display = "none") {
        for (var i=0; i < 3; i++) {
            competitorInput3[i].toggleAttribute("required", false);
        }
        for (var i=0; i < competitorSelect3.length; i++) {
            competitorSelect3[i].toggleAttribute("required", false);
        }
    }

    addCompetitor3.onclick = function() {
        competitor3.style.display = "block";
        for (var i=0; i < 3; i++) {
            competitorInput3[i].toggleAttribute("required", true);
        }
        for (var i=0; i < competitorSelect3.length; i++) {
            competitorSelect3[i].toggleAttribute("required", true);
        }
    }

    removeCompetitor3.onclick = function() {
        competitor3.style.display = "none";
        for (var i=0; i < 3; i++) {
            competitorInput3[i].toggleAttribute("required", false);
        }
        for (var i=0; i < competitorSelect3.length; i++) {
            competitorSelect3[i].toggleAttribute("required", false);
        }
    }

    // *******************    COMPETITOR 4    *******************

    var competitor4 = document.getElementById("competitor4");
    var addCompetitor4 = document.getElementById("add-competitor3");
    var removeCompetitor4 = document.getElementById("remove-competitor3");

    var competitorInput4 = competitor4.getElementsByTagName("input");
    var competitorSelect4 = competitor4.getElementsByTagName("select");

    if (competitor4.style.display = "none") {
        for (var i=0; i < 3; i++) {
            competitorInput4[i].toggleAttribute("required", false);
        }
        for (var i=0; i < competitorSelect4.length; i++) {
            competitorSelect4[i].toggleAttribute("required", false);
        }
    }

    addCompetitor4.onclick = function() {
        competitor4.style.display = "block";
        for (var i=0; i < 3; i++) {
            competitorInput4[i].toggleAttribute("required", true);
        }
        for (var i=0; i < competitorSelect4.length; i++) {
            competitorSelect4[i].toggleAttribute("required", true);
        }
    }

    removeCompetitor4.onclick = function() {
        competitor4.style.display = "none";
        for (var i=0; i < 3; i++) {
            competitorInput4[i].toggleAttribute("required", false);
        }
        for (var i=0; i < competitorSelect4.length; i++) {
            competitorSelect4[i].toggleAttribute("required", false);
        }
    }

    // *******************    COMPETITOR 5    *******************

    var competitor5 = document.getElementById("competitor5");
    var addCompetitor5 = document.getElementById("add-competitor4");
    var removeCompetitor5 = document.getElementById("remove-competitor4");

    var competitorInput5 = competitor5.getElementsByTagName("input");
    var competitorSelect5 = competitor5.getElementsByTagName("select");

    if (competitor5.style.display = "none") {
        for (var i=0; i < 3; i++) {
            competitorInput5[i].toggleAttribute("required", false);
        }
        for (var i=0; i < competitorSelect5.length; i++) {
            competitorSelect5[i].toggleAttribute("required", false);
        }
    }

    addCompetitor5.onclick = function() {
        competitor5.style.display = "block";
        for (var i=0; i < 3; i++) {
            competitorInput5[i].toggleAttribute("required", true);
        }
        for (var i=0; i < competitorSelect5.length; i++) {
            competitorSelect5[i].toggleAttribute("required", true);
        }
    }

    removeCompetitor5.onclick = function() {
        competitor5.style.display = "none";
        for (var i=0; i < 3; i++) {
            competitorInput5[i].toggleAttribute("required", false);
        }
        for (var i=0; i < competitorSelect5.length; i++) {
            competitorSelect5[i].toggleAttribute("required", false);
        }
    }

    // *******************    ACCORDION    *******************

    var accordion = document.getElementsByClassName("accordion-header");
    var i;

    for (i = 0; i < accordion.length; i++) {
        accordion[i].addEventListener("click", function() {
            this.classList.toggle("accordion-header--inactive");
            this.nextElementSibling.classList.toggle("accordion-content--inactive");
        });
    }


    // *******************    MODAL WINDOW    *******************

    var modal = document.getElementById("modal");
    var modalBtn = document.getElementsByClassName("music-upload");
    Array.prototype.forEach.call(modalBtn, openModal);
    var modalCloseBtn = document.getElementById("modal-btn");

    function openModal(item, index) {
        item.onclick = function(event) {
            event.preventDefault();
            modal.style.display = "block";
        } 
    }

    modalCloseBtn.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
    }
}
