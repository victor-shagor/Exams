$(document).ready(function() {
    $(".technical").addClass("show");
    $(".cat").on("click", function(e) {
        $(".cat").removeClass("show");
        $(e.target).addClass("show");
        if (e.target.classList.contains("tech")) {
            $(".que").removeClass("show");
            $(".technical").addClass("show");
        } else if (e.target.classList.contains("apt")) {
            $(".que").removeClass("show");
            $(".aptitude").addClass("show");
        } else if (e.target.classList.contains("log")) {
            $(".que").removeClass("show");
            $(".logical").addClass("show");
        }
    });

    $("#edit").on("show.bs.modal", function(e) {
        console.log("hi");
        var button = $(e.relatedTarget);
        var question = button.data("question");
        var answer1 = button.data("answer1");
        var answer2 = button.data("answer2");
        var answer3 = button.data("answer3");
        var answer4 = button.data("answer4");
        var category = button.data("category");
        var question_id = button.data("question_id");

        var modal = $(this);
        modal.find(".modal-body #question").val(question);
        modal.find(".modal-body #answer1").val(answer1);
        modal.find(".modal-body #answer2").val(answer2);
        modal.find(".modal-body #answer3").val(answer3);
        modal.find(".modal-body #answer4").val(answer4);
        modal
            .find(".modal-body #category")
            .val(category)
            .change();
        modal.find(".modal-body #question_id").val(question_id);
    });
});
