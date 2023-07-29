<!DOCTYPE html>

<head>
    <title>Mini-Game</title>
    <!--
    <script src="./js/test.js" type="module"></script>
-->
</head>
<script>
    class AABB {
        constructor(centerX, centerY, halfx, halfy) {
            this.centerX = centerX;
            this.centerY = centerY;
            this.halfx = halfx;
            this.halfy = halfy;
        }
        getHalfX() {
            return this.halfx;
        }
        getHalfY() {
            return this.halfy;
        }
        getCenterX() {
            return this.centerX;
        }
        setCenterX(x) {
            this.centerX = x;
        }
        getCenterY() {
            return this.centerY;
        }
        setCenterY(y) {
            this.centerY = y;
        }
        colliding(ayaybebe) {
            var offsetX = Math.abs(this.centerX - ayaybebe.getCenterX());
            var offsetY = Math.abs(this.centerY - ayaybebe.getCenterY());
            if (offsetX > this.halfx + ayaybebe.getHalfX()) return false;
            if (offsetY > this.halfy + ayaybebe.getHalfY()) return false;
            return true;
        }
    }
</script>
<style>
    body {
        background-color: black;
        color: white;
    }

    canvas {
        border: 1px solid white;
        image-rendering: pixelated;
        width: 512px;
        height: 512px;
    }
</style>

<body>
    <div style="margin: auto; width: 50%">
        <p>
            High Score: <span id="high_score">0</span> |
            Score: <span id="score">0</span>
        </p>
        <canvas id="glcanvas" width="256" height="256">Your browser may not support webGL, which is needed to run this Game.</canvas>
    </div>
</body>
<script>
</script>

<script>
    let canvas = document.getElementById("glcanvas");
    const ctx = canvas.getContext("2d");
    let player = {
        //player coordinates
        x: 3,
        y: 6,
        //player velocity
        dx: 2,
        dy: 2,
        AABB: new AABB(0, 0, 32 / 2, 32 / 2)
    }
    const movementX = 2;
    const movementY = 2;
    //this part of the code handles key presses
    document.addEventListener('keydown', function(e) {
        console.log("key pressed:" + e.keyCode);
        if (e.keyCode == ' '.charCodeAt(0)) { //spacebar
            //uhh todo...?
        } else if (e.keyCode == 'W'.charCodeAt(0)) { //W
            player.dy = movementY;
        } else if (e.keyCode == 'A'.charCodeAt(0)) { //A
            player.dx = -movementX;
        } else if (e.keyCode == 'D'.charCodeAt(0)) { //D
            player.dx = movementX;
        } else if (e.keyCode == 'S'.charCodeAt(0)) { //S
            player.dy = -movementY;
        }
    });
    document.addEventListener('keyup', function(e) {
        console.log("key pressed:" + e.keyCode);
        if (e.keyCode == ' '.charCodeAt(0)) { //spacebar

        } else if (e.keyCode == 'W'.charCodeAt(0)) { //W
            if (player.dy == movementY) player.dy = 0;
        } else if (e.keyCode == 'A'.charCodeAt(0)) { //A
            if (player.dx == -movementX) player.dx = 0;
        } else if (e.keyCode == 'D'.charCodeAt(0)) { //D
            if (player.dx == movementX) player.dx = 0;
        } else if (e.keyCode == 'S'.charCodeAt(0)) { //S
            if (player.dy == -movementY) player.dy = 0;
        }
    });

    function generateLoot() {
        //generate loot
        return new AABB(Math.floor(Math.random() * (canvas.width - 16/2)), Math.floor(Math.random() * (canvas.height - 16/2)), 16 / 2, 16 / 2);
        return lootAABB;
    }
    var loot = generateLoot();
    let hscore = 0;
    let score = 0;

    function loop() {
        //clear the screen
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        if (player.AABB.colliding(loot)) {
            while (player.AABB.colliding(loot)) {
                loot = generateLoot();
            }
            if (hscore < ++score) {
                hscore = score;
                document.getElementById("high_score").innerHTML = hscore;
            }
            document.getElementById("score").innerHTML = score;
        }
        ctx.fillStyle = "#FF0000";
        ctx.fillRect(loot.getCenterX(), loot.getCenterY(), 16, 16);
        //update the player
        player.x += player.dx;
        player.y -= player.dy; //subtract because y is inverted
        //check for collisions with map
        if (player.x < 0) player.x = 0;
        if (player.x > canvas.width - 32) player.x = canvas.width - 32;
        if (player.y < 0) player.y = 0;
        if (player.y > canvas.height - 32) player.y = canvas.height - 32;

        player.AABB.setCenterX(player.x);
        player.AABB.setCenterY(player.y);
        //draw the player
        ctx.fillStyle = "#008080";
        ctx.fillRect(player.x, player.y, 32, 32);

        //request another frame
        requestAnimationFrame(loop);
    }
    requestAnimationFrame(loop);
</script>