<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
        <form action="/posts" method="POST">
            @csrf
            <div class="sounder">
                <h2>Javascriptで録音するよ</h2>
                <div id="app">
                    <button class="btn btn-danger" type="button" v-if="status=='ready'" @click="startRecording">録音を開始する</button>
                    <button class="btn btn-primary" type="button" v-if="status=='recording'" @click="stopRecording">録音を終了する</button>
                    
                    <audio id="audioElement" controls></audio>
                </div>
                
            </div>
            <div class="profile">
                <h2>profile(仮)</h2>
                <input type="number" name="post[profiles_id]" placeholder="id"/>
            </div>
            <div class="instrument">
                <h2>instrument</h2>
                <select name="post[instruments_id]">
                    @foreach($instruments as $instrument)
                        <option value="{{$instrument->id}}" selected>
                            {{$instrument->name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="sound">
                <h2>sound</h2>
                <input type="text" name="post[sound]" placeholder="sound"/>
            </div>
            <div class="img">
                <h2>img</h2>
                <input type="text" name="post[img]" placeholder="img"/>
            </div>
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="post[title]" placeholder="投稿タイトル入力"/>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="post[text]" placeholder="説明文及び使用機材詳細入力"></textarea>
            </div>
            <div>
                <h2>Tag</h2>
                @foreach($tags as $tag)
                <label>
                    <input type="checkbox" value="{{$tag->id}}" name="tags_array[]">
                        {{$tag->name}}
                    </input>
                </label>
                @endforeach
            </div>
            
            <input type="submit" value="投稿"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.0"></script>
        <script>
            new Vue({
                el:'#app',
                data: {
                status: 'init',     // 状況
                recorder: null,     // 音声にアクセスする "MediaRecorder" のインスタンス
                audioData: [],      // 入力された音声データ
                audioExtension: ''  // 音声ファイルの拡張子
                
                },
                methods:{
                    startRecording() {
    
                        this.status = 'recording';
                        this.audioData = [];
                        this.recorder.start();
                    
                    },
                    stopRecording() {
                    
                        this.recorder.stop();
                        this.status = 'ready';
                    
                    },
                    
                    getExtension(audioType) {
    
                        let extension = 'wav';
                        const matches = audioType.match(/audio\/([^;]+)/);
                    
                        if(matches) {
                    
                            extension = matches[1];
                    
                        }
                    
                        return '.'+ extension;
                    
                    }
                },
                mounted(){
                    navigator.mediaDevices.getUserMedia({ audio: true })
                        .then(stream => {
                            //音声のストリームをMediaRecorderにわたす
                            this.recorder = new MediaRecorder(stream);
                            //dataavailableで音声データ取得
                            this.recorder.addEventListener('dataavailable', e => {
                    
                                this.audioData.push(e.data);//取得したデータを格納
                                this.audioExtension = this.getExtension(e.data.type);
                    
                            });
                            //録音を止めるとデータを再生できる。取り直しも可能
                            this.recorder.addEventListener('stop', () => {
                    
                                const audioBlob = new Blob(this.audioData);
                                const url = URL.createObjectURL(audioBlob);
                                const audioElement = document.getElementById('audioElement');
                                audioElement.src = url;
                                
                            });
                            this.status = 'ready';
                    
                        });
                    }
            })
        </script>
    </body>
</html>