<!--[if IE]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<style>
    #title {
        font-size: 120px;
        font-weight: 100;

        margin-bottom: 40px;
    }
    h1, h2, h3 {
        font-weight: 100;
    }
    #panel {
        font-size: 14px;
    }
    #panel input {
        display: block;
        margin: 0 auto;
        max-width:100%;
        margin-bottom: 20px;
    }
    .containers {
        display: inline-block;
        width: 100%
        margin: 0;
        margin-top:25%;

    }
    .containers > img {
        max-width:100%;
        width: 100%;
    }
    .containers .iphone-display {

        background: #111;
        background-size: cover;

    }
    .containers canvas {
        max-width:100%;

    }
    .heading_ {
        font-family: 'Quicksand', sans-serif;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -moz-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        font-size:21px;
        text-shadow: 0 0 10px #FFFFFF;
        color: #<?=$text_color;?>;
    }
</style>
<div class="containers">
<script>

    function SiriWave9Curve(opt) {
        opt = opt || {};
        this.controller = opt.controller;
        this.color = opt.color;
        this.tick = 0;
        this.respawn();
    }
    SiriWave9Curve.prototype.respawn = function() {
        this.amplitude = 0.3 + Math.random() * 0.7;
        this.seed = Math.random();
        this.open_class = 2+(Math.random()*3)|0;
    };
    SiriWave9Curve.prototype.equation = function(i) {
        var p = this.tick;
        var y = -1 * Math.abs(Math.sin(p)) * this.controller.amplitude * this.amplitude * this.controller.MAX * Math.pow(1/(1+Math.pow(this.open_class*i,2)),2);
        if (Math.abs(y) < 0.001) {
            this.respawn();
        }
        return y;
    };
    SiriWave9Curve.prototype._draw = function(m) {
        this.tick += this.controller.speed * (1-0.5*Math.sin(this.seed*Math.PI));
        var ctx = this.controller.ctx;
        ctx.beginPath();
        var x_base = this.controller.width/2 + (-this.controller.width/4 + this.seed*(this.controller.width/2) );
        var y_base = this.controller.height/2;
        var x, y, x_init;
        var i = -3;
        while (i <= 3) {
            x = x_base + i * this.controller.width/4;
            y = y_base + (m * this.equation(i));
            x_init = x_init || x;
            ctx.lineTo(x, y);
            i += 0.01;
        }
        var h = Math.abs(this.equation(0));
        var gradient = ctx.createRadialGradient(x_base, y_base, h*1.15, x_base, y_base, h * 0.3 );
        gradient.addColorStop(0, 'rgba(' + this.color.join(',') + ',0.4)');
        gradient.addColorStop(1, 'rgba(' + this.color.join(',') + ',0.2)');
        ctx.fillStyle = gradient;
        ctx.lineTo(x_init, y_base);
        ctx.closePath();
        ctx.fill();
    };
    SiriWave9Curve.prototype.draw = function() {
        this._draw(-1);
        this._draw(1);
    };
    function SiriWave9(opt) {
        opt = opt || {};
        this.tick = 0;
        this.run = false;
        // UI vars
        this.ratio = opt.ratio || window.devicePixelRatio || 1;
        this.width = this.ratio * (opt.width || 320);
        this.height = this.ratio * (opt.height || 100);
        this.MAX = this.height/2;
        this.speed = 0.1;
        this.amplitude = opt.amplitude || 1;
        // Canvas
        this.canvas = document.createElement('canvas');
        this.canvas.width = this.width;
        this.canvas.height = this.height;
        this.canvas.style.width = (this.width / this.ratio) + 'px';
        this.canvas.style.height = (this.height / this.ratio) + 'px';
        this.container = opt.container || document.body;
        this.container.appendChild(this.canvas);
        this.ctx = this.canvas.getContext('2d');
        // Create curves
        this.curves = [];
        for (var i = 0; i < SiriWave9.prototype.COLORS.length; i++) {
            var color = SiriWave9.prototype.COLORS[i];
            for (var j = 0; j < (3 * Math.random())|0; j++) {
                this.curves.push(new SiriWave9Curve({
                    controller: this,
                    color: color
                }));
            }
        }
        if (opt.autostart) {
            this.start();
        }
    }
    SiriWave9.prototype._clear = function() {
        this.ctx.globalCompositeOperation = 'destination-out';
        this.ctx.fillRect(0, 0, this.width, this.height);
        this.ctx.globalCompositeOperation = 'lighter';
    };
    SiriWave9.prototype._draw = function() {
        if (this.run === false) return;
        this._clear();
        for (var i = 0, len = this.curves.length; i < len; i++) {
            this.curves[i].draw();
        }
        requestAnimationFrame(this._draw.bind(this));
        //setTimeout(this._draw.bind(this), 100);
    };
    SiriWave9.prototype.start = function() {
        this.tick = 0;
        this.run = true;
        this._draw();
    };
    SiriWave9.prototype.stop = function() {
        this.tick = 0;
        this.run = false;
    };
    var firstcolor = hexToRgb('<?=$first_circle_color;?>');
    var secondcolor = hexToRgb('<?=$second_circle_color;?>');
    var thirdcolor = hexToRgb('<?=$circle_bg_color;?>');
    SiriWave9.prototype.COLORS = [
        [firstcolor.r,firstcolor.g,firstcolor.b],
        [secondcolor.r,secondcolor.g,secondcolor.b],
        [thirdcolor.r,thirdcolor.g,thirdcolor.b]
    ];

    function hexToRgb(hex) {
        var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
        return result ? {
            r: parseInt(result[1], 16),
            g: parseInt(result[2], 16),
            b: parseInt(result[3], 16)
        } : null;
    }
</script>
<div id="container-ios9"></div>
    <br>
    <span id="status" class="heading_">Loading</span>
<script>
    var $siri_ios9 = document.getElementById('container-ios9');
    var SW9 = new SiriWave9({
        width: screen.width,
        height: 30,
        speed: 0.2,
        amplitude: 1,
        container: $siri_ios9,
        autostart: true,
    });
</script>


</div>