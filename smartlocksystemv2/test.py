import tkinter as tk
from tkinter import ttk

class Application:

    def __init__(self):
        self.tk = tk.Tk()
        self.tk.title("Three-Factor Authentication Security Door Lock")
        self.frame = tk.Frame(self.tk)
        self.frame.grid()
        self.tk.columnconfigure(0, weight=1)
        self.tk.attributes('-zoomed', True)
        self.tk.attributes('-fullscreen', True)
        self.state = True
        self.tk.bind("<F11>", self.toggle_fullscreen)
        self.tk.bind("<Escape>", self.end_fullscreen)
        self.tk.config(cursor="none")
        self.show_idle()
        t = Thread(target=self.listen_rfid)
        t.daemon = True
        t.start()
		
    def show_idle(self):
    	self.welcomeLabel = ttk.Label(self.tk, text="Please Present\nYour Token")
    	self.welcomeLabel.config(font='size, 20', justify='center', anchor='center')
    	self.welcomeLabel.grid(sticky=tk.W+tk.E, pady=210)
