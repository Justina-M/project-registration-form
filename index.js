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

// *******************    SHOW JUDGE SECTION    *******************

    var judge = document.getElementById("judge");
    var showJudge = document.getElementById("delegate-judge-yes");
    var hideJudge = document.getElementById("delegate-judge-no");   

    // if (showJudge.onclick) {
    //     judge.style.display = "block";
    // } else {
    //     judge.style.display = "none";
    // }

    showJudge.onclick = function() {
        judge.style.display = "block";
    }

    hideJudge.onclick = function() {
        judge.style.display = "none";
    }

// *******************    ADD COMPETITOR SECTION    *******************

    var j = 1;
    competitor = document.getElementById("competitor" + j)
    var clonedCompetitor = competitor.cloneNode(true);
    var cloneCompetitorYes = document.getElementById("add-competitor-yes" + j);
    var competitorHeading = document.getElementById("competitor-heading");
    competitorHeading.textContent += j;

    cloneCompetitorYes.onclick = function addCompetitor() {
        clonedCompetitor.id = "competitor" + ++j;
        competitor.parentNode.appendChild(clonedCompetitor);    // sukuria nauja competitor, bet nebeveikia accordion. neranda naujai sukurtos accordion-header klases
    }

    // var j;
    // for (j = 1; j <= 10; j++) {
    //     var competitor = document.getElementById("competitor" + j);
    //     console.log(competitor);
    //     var cloneCompetitorYes = document.getElementById("add-competitor-yes" + j);
    //     console.log(cloneCompetitorYes);
    //     cloneCompetitorYes[j].addEventListener("click", function() {
    //         var clonedCompetitor = competitor.cloneNode(true);
    //         competitor.parentNode.appendChild(clonedCompetitor);
    //     });
    // }

// *******************    ACCORDION    *******************
    
    var accordion = document.getElementsByClassName("accordion-header");
    var i;

    for (i = 0; i < accordion.length; i++) {
        console.log(accordion.length);
        accordion[i].addEventListener("click", function() {
            this.classList.toggle("accordion-header--active");
            var accordionContent = this.nextElementSibling;
            if (accordionContent.style.maxHeight) {
                accordionContent.style.maxHeight = null;
            } else {
                accordionContent.style.maxHeight = accordionContent.scrollHeight + "px";
            }
        });
    }

}

