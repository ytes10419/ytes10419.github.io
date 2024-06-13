import os
import tempfile
import pygame
from google.cloud import speech_v1p1beta1
from google.cloud.speech_v1p1beta1 import enums
from google.cloud import texttospeech
import pyaudio
import wave

# 设置 Google Cloud 认证凭据环境变量
os.environ["GOOGLE_APPLICATION_CREDENTIALS"] = "path/to/your/credentials.json"

def record_audio(file_path, duration=5, chunk=1024, channels=1, rate=44100):
    audio = pyaudio.PyAudio()
    stream = audio.open(format=pyaudio.paInt16,
                        channels=channels,
                        rate=rate,
                        input=True,
                        frames_per_buffer=chunk)
    frames = []
    print("Recording...")
    for i in range(0, int(rate / chunk * duration)):
        data = stream.read(chunk)
        frames.append(data)
    print("Finished recording.")
    stream.stop_stream()
    stream.close()
    audio.terminate()
    wf = wave.open(file_path, 'wb')
    wf.setnchannels(channels)
    wf.setsampwidth(audio.get_sample_size(pyaudio.paInt16))
    wf.setframerate(rate)
    wf.writeframes(b''.join(frames))
    wf.close()

def transcribe_audio(file_path):
    client = speech_v1p1beta1.SpeechClient()

    # 读取音频文件
    with open(file_path, "rb") as audio_file:
        content = audio_file.read()

    # 设置语音配置
    audio = speech_v1p1beta1.RecognitionAudio(content=content)
    config = speech_v1p1beta1.RecognitionConfig(
        encoding=enums.RecognitionConfig.AudioEncoding.LINEAR16,
        sample_rate_hertz=44100,
        language_code="en-US",
    )

    # 发起语音识别请求
    response = client.recognize(config=config, audio=audio)

    # 处理识别结果
    for result in response.results:
        return result.alternatives[0].transcript

def synthesize_speech(text, output_file):
    client = texttospeech.TextToSpeechClient()

    synthesis_input = texttospeech.SynthesisInput(text=text)

    # 设置语音配置
    voice = texttospeech.VoiceSelectionParams(
        language_code="en-US",
        name="en-US-Wavenet-D",
    )

    audio_config = texttospeech.AudioConfig(
        audio_encoding=texttospeech.AudioEncoding.LINEAR16
    )

    # 发起语音合成请求
    response = client.synthesize_speech(
        input=synthesis_input, voice=voice, audio_config=audio_config
    )

    # 保存语音输出
    with open(output_file, "wb") as out:
        out.write(response.audio_content)

def play_audio(file_path):
    pygame.init()
    pygame.mixer.music.load(file_path)
    pygame.mixer.music.play()
    while pygame.mixer.music.get_busy():
        pygame.time.Clock().tick(10)

def main():
    audio_file = "output.wav"

    # 录制音频
    record_audio(audio_file)

    # 语音识别
    text = transcribe_audio(audio_file)
    print("Transcript:", text)

    # 语音合成
    output_file = "output.mp3"
    synthesize_speech(text, output_file)

    # 播放语音
    play_audio(output_file)

    # 清理临时文件
    os.remove(audio_file)
    os.remove(output_file)

if __name__ == "__main__":
    main()
