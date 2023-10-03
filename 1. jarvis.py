# pip install pyaudio

import pyttsx3 #pip install pyttsx3
import speech_recognition as sr #pip install speechRecognition
import datetime
import wikipedia #pip install wikipedia
import webbrowser
import os
import smtplib
import mixer
import winsound
# import pygame
import sys
import winsound


engine = pyttsx3.init('sapi5')
voices = engine.getProperty('voices')
# print(voices[1].id)
engine.setProperty('voice', voices[0].id)


def speak(audio):
    engine.say(audio)
    engine.runAndWait()


def wishMe():
    hour = int(datetime.datetime.now().hour)
    if hour>=0 and hour<12:
        speak("Good Morning!mohammad assalamu alaikum")

    elif hour>=12 and hour<18:
        speak("Good Afternoon!mohammad assalamu alaikum")   

    else:
        speak("Good Evening!mohammad assalamu alaikum")  

    speak(" I am Jarvis . Please tell me how may I help you")       

def takeCommand():
    #It takes microphone input from the user and returns string output

    r = sr.Recognizer()
    with sr.Microphone() as source:
        print("Listening...")
        r.pause_threshold = 1
        audio = r.listen(source)

    try:
        print("Recognizing...")    
        query = r.recognize_google(audio, language='en-in')
        print(f"User said: {query}\n")

    except Exception as e:
        # print(e)    
        print("Say that again please...")  
        return "None"
    return query

def sendEmail(to, content):
    server = smtplib.SMTP('smtp.gmail.com', 587)
    server.ehlo()
    server.starttls()
    server.login('saifworkingyes@gmail.com', 'Saifworkingyes@123')
    server.sendmail('saifworkingyes@gmail.com', to, content)
    server.close()


# def stop():
#     pygame.mixer.music.stop(songs)

if __name__ == "__main__":
    wishMe()
    while True:
    # if 1:
        query = takeCommand().lower()

        # Logic for executing tasks based on query
        if 'wikipedia' in query:
            speak('Searching Wikipedia...')
            query = query.replace("wikipedia", "")
            results = wikipedia.summary(query, sentences=2)
            speak("According to Wikipedia")
            print(results)
            speak(results)

        elif 'open youtube' in query:
            webbrowser.open("youtube.com")

        elif 'my channel' in query:
            webbrowser.open("youtube.com/channel/UCaUar4zW88P4laRYdSoKaUQ")

        elif 'open google' in query:
            webbrowser.open("google.com")

        elif 'doraemon' in query:
            speak("ok mai aapko doreamon ka best episode dikhata hoo lekin aap homework bhi time per complete kiya karo because you are good na?")
            webbrowser.open("youtube.com/watch?v=H1OIwKyu4iQ")   


        elif 'read' in query:
            music_dir = "C:\\Users\\Mohammad Saif\\Desktop\\songs q\\surah baqarah.mp3.crdownload"
            songs = os.listdir(music_dir)
            print(songs)
            os.startfile(os.path.join(music_dir,songs[0]))
            if 'stop' in query:
               sys.exit(music_dir("C:\\Users\\Mohammad Saif\\Desktop\\songs q"))
            
            # for i in songs:
            #  os.startfile(os.path.join(music_dir,i))
            # if 'break' in query:
            #     break
            # # songs = os._exit(music_dir)
            # # os.close(os.path.join(music_dir,songs[0]))
            # # winsound.PlaySound(None,0)
            # # songs= os.listdir(music_dir(exit))
            # os.path.__all__.clear
        
            
            
        

        elif 'what\'s the time' in query:
            strTime = datetime.datetime.now().strftime("%H:%M:%S")    
            speak(f"Sir, the time is {strTime}")

        elif 'open code' in query:
            codePath = "C:\\Users\\MUBASSHIR BAIG\\AppData\\Local\\Programs\\Microsoft VS Code\\Code.exe"
            os.startfile(codePath)

        elif 'send email' in query:
            try:
                speak("What should I say?")
                content = takeCommand()
                to = "mohammadsaifmoinuddin@gmail.com"    
                sendEmail(to, content)
                speak("Email has been sent!")
            except Exception as e:
                print(e)
                speak("Sorry sir. I am not able to send this email")    
        else:
            print("No query matched")