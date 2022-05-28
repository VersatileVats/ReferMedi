intent(noctx,'What does this app do?', p=> {
   p.play('This is an online patient record keeping system, enabled with many functionalities like Referring a patient, maintaining patient\'s and doctor\'s record & much more'); 
});

intent(noctx,'How Alan AI elevates (this|the) project?', p=> {
   p.play('Alan AI can help you create a new patient, update the hospital details, search for registered patients, and check the referral stats. All this with the help of your beautiful voice and Alan AI\'s out of the box skills'); 
});

intent(noctx,'What (concept_) of Alan has been used in this app?', p=> {
   p.play('The following concepts have been used in this app:');
   p.play('1. Commands & responses. 2. Patterns (with alternatives). 3. Static & predefined slots alongwith regular expressions');
   p.play('4. A ton of contexts and used the no context parameter also. 5. Moment js library. 6. Predefined script objects that is userData');
   p.play('7. Lifecycle predefined callbacks. 8. callProject API method & alan handlers');
});

intent(noctx,'I want to change hospital details', p=> {
   p.play('Enter number of beds');
   p.then(changeHospitalDetails);
});

let changeHospitalDetails = context(() => {
    intent('Bed count is $(NUMBER)', p=> {
       p.userData.beds = p.NUMBER.value;
       p.play({command: 'changeBeds', item: p.NUMBER.value});
        
       projectAPI.checkHospitalPage = function(p, param, callback) {
        if (`${param.value}`!=="https://wheels4water.me/medibuddy/profile.php?action=hospital") {
             
            p.play('Oops, you does not seem to be on the right page. You must be on the profile page to use this command');
            p.resolve();
        }
       };
       p.play('Enter number of doctors');
       p.then(changeDoctorDetails);
    });
});

let changeDoctorDetails = context(() => {
    intent('Doctor count is $(NUMBER)', p=> {
       p.userData.doctors = p.NUMBER.value;
       p.play({command: 'changeDoctors', item: p.NUMBER.value});
        
       p.play(`You have entered: ${p.userData.doctors} doctors & ${p.userData.beds} beds`);
       p.play('Are the details correct?');
       p.then(confirmChange);
    });
});

let confirmChange = context(()=> {
      intent('Yes, (it is correct|)',p=> {
          p.play('Submitting the information');
          p.play({command: 'submitDetails', item: `utilities/update_details.php?beds=${p.userData.beds}&doctors=${p.userData.doctors}`});
          p.resolve();
      });
    
    intent('No, (I want to change it|)', p=> {
        p.play('Sure, you can take your time');
        p.resolve();
    });
    
    fallback('Please say Yes or No'); 
});

intent(noctx,'I want to add a (new|) patient', p=> {
   p.play('Taking you to the create user page');
   p.play({command: 'createPatient', item: 'profile.php?action=create_user'});
});

intent(noctx,'Take me to the dashboard', p=> {
   p.play('Directing you to the dashboard');
   p.play({command: 'dashBoard', item: 'index.php'});
});

intent(noctx,'Take me to the referral page', p=> {
   p.play('Directing you to the referral page');
   p.play({command: 'referral', item: 'referral_stats.php'});
});

intent(noctx,
       '(Terminate|end) (my|the) session', 
       'Log me out',
       'Sign (me|) out please',p=> {
       p.play('Ending the session');
       p.play({command: 'endSession', item: 'referral_stats.php'});
});


intent(noctx,'Show me table records', p=> {
   p.play('Directing you to the patient\'s page');
   p.play({command: 'table', item: 'table.php'});
});

intent(noctx,'Let\'s start filling the details', p=> {
   p.play('Enter patient\'s name');
   p.then(addName);
});

let addName = context(() => {
     intent('Name is $(NAME)', p=> {
       p.userData.name = p.NAME.value;
       p.play({command: 'addName', item: p.NAME.value});
         
       projectAPI.checkPatientPage = function(p, param, callback) {
        if (`${param.value}`!=="https://wheels4water.me/hackfest/profile.php?action=create_user") {
            p.play('Oops, you does not seem to be on the right page. You must say I want to add a new patient in order to use this command');
         }
       };
       p.then(addDOA);
       p.play('Enter date of admission');
    });
});

let addDOA = context(()=> {
   intent('Date of admission is $(DATE)', p=> {
      p.userData.doa = p.DATE.moment.format("YYYY-MM-DD");
      p.play({command: 'addDOA', item: p.DATE.moment.format("YYYY-MM-DD")});
      p.play('Enter patient\'s age');
      p.then(addAge);
   });
});

let addAge = context(()=> {
   intent('Age is $(NUMBER)', p=> {
      p.userData.age = p.NUMBER.value;
      p.play({command: 'addAge', item: p.NUMBER.value});
      p.play('Add a note');
      p.then(addNote);
   });
});

let addNote = context(()=> {
   intent('$(NOTE* (.+))', p => {
       p.userData.note = p.NOTE.value;
       p.play({command: 'addNote', item: p.NOTE.value});
       p.play(`You've said: ${p.NOTE.value}`);
       p.play('Is the patient critical?');
       p.then(addStatus);
    }); 
});

let addStatus = context(()=> {
   intent('Yes',p=> {
      p.userData.status = 'true';
      p.play({command:'setStatus', item: 'true'});
      p.play('Now please add the remainig fields');
      p.play('Shall I submit the details?');
      p.then(submitPatient);
   });
    
   intent('No',p=> {
      p.userData.status = 'false';
      p.play('Now please add the remainig fields'); 
      p.play('Shall I submit the details?');
      p.then(submitPatient);
   });
});

let submitPatient = context(()=> {
   intent('Yes, (you may|)',p=>{
      p.play({command: 'submitPatient', item: `utilities/patient_details.php?name=${p.userData.name.replace(/ /g, '%20')}&doa=${p.userData.doa}&age=${p.userData.age}&note=${p.userData.note.replace(/ /g, '%20')}&status=${p.userData.status}`}); 
      p.resolve();
   }); 
    
   fallback("Say yes, to proceed");
});

projectAPI.foundOrNot = function(p, param, callback) {
  p.play(`${param.value}`);
};

intent('Patients referred by my hospital', p=> {
   p.play({command: 'referredByUs'});
});

projectAPI.referByUs = function(p, param, callback) {
  p.play(`${param.value}`);
};

intent('I (want|have) to see details of patient $(NUMBER) ',p=> {
    p.play(`Here are the details of patient no ${p.NUMBER.value}`);
    p.play({command:'getDetails', item: p.NUMBER.value});
});

intent('I (want|have) to add reports of patient $(NUMBER) ',p=> {
    p.play(`Taking you there`);
    p.play({command:'uploadReports', item: p.NUMBER.value});
})

fallback('I am not programmed to execute this phrase. Please try again');    
