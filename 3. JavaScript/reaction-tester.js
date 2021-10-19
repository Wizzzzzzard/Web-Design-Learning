            var start = new Date().getTime();

            function getRandomColor() {

                var letters = '0123456789ABCDEF'.split('');
                var color = '#';

                for (var i = 0; i < 6; i++) {

                    color += letters[Math.floor(Math.random() * 16)];

                }

                return color;

            }

            function makeShapeAppear() {

                var top = Math.random() * 400;

                var left = Math.random() * 400;

                var dimension = 100 + (Math.random() * 300);

                if (Math.random() > 0.5) {

                    document.getElementById("random-shapes").style.borderRadius = "50%";

                } else {

                    document.getElementById("random-shapes").style.borderRadius = "0";

                }

                document.getElementById("random-shapes").style.backgroundColor = getRandomColor();

                document.getElementById("random-shapes").style.width = dimension + "px";

                document.getElementById("random-shapes").style.height = dimension + "px";

                document.getElementById("random-shapes").style.top = top + "px";

                document.getElementById("random-shapes").style.left = left + "px";

                document.getElementById("random-shapes").style.display = "block";

                start = new Date().getTime();

            }
            
            function appearAfterDelay() {
                
                setTimeout(makeShapeAppear, (Math.random() * 2000));

            }

            appearAfterDelay();

            document.getElementById("random-shapes").onclick = function() {

                document.getElementById("random-shapes").style.display = "none";

                var end = new Date().getTime();

                var timeTaken = (end - start)/1000;

                document.getElementById("time-taken").innerHTML = timeTaken + "s";

                appearAfterDelay();

            };