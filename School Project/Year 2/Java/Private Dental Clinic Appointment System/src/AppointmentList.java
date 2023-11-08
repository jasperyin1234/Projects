import java.util.*;
import java.io.*;
import java.time.LocalDate;
import java.time.temporal.ChronoField;
public class AppointmentList 
{
	// ArrayList for appointment
	private ArrayList <Appointment> appointmentList;
	
	// Get appointment list
	public Appointment[] getAppointmentList()
	{
		Appointment[] permanentList = new Appointment [appointmentList.size()];
		for (int i = 0; i < appointmentList.size(); i++) 
		{
			permanentList[i] = appointmentList.get(i);
		}
		return permanentList;
	}
	
	// Constructor
	public AppointmentList()
	{
		appointmentList = new ArrayList<Appointment>();
	}
	
	// Record new Appointment into array
	public void recordAppointment(Appointment a)
	{
		appointmentList.add(a);
	}
	
	// Get number of Appointment
	public int getNumberOfAppointment()
	{
		return appointmentList.size();
	}
	
	// Displaying all Appointment info in a table
	public void displayAppointmentList()
	{
		System.out.println(" ");
		System.out.printf("--------------------------------------------APPOINTMENT LIST---------------------------------------------\n");
		System.out.println("BIL  PATIENT NAME         DOCTOR NAME            APPOINTMENT ID      DATE        TIME SLOT");
		System.out.println("---------------------------------------------------------------------------------------------------------");
		for(int i = 0; i < appointmentList.size(); i++)
		{
			System.out.printf("%-5d%-21s%-23s%-20s%d/%d/%-5d%s\n", (i + 1), appointmentList.get(i).getPatient().getName(), 
					appointmentList.get(i).getDoctor().getName(), appointmentList.get(i).getApptId(),
					appointmentList.get(i).getYear(), appointmentList.get(i).getMonth(), appointmentList.get(i).getDay()
					, appointmentList.get(i).getTime(appointmentList.get(i).getSlot()));
		}
	}
	
	// Show user-related pending Appointment list by using user username
	public void pendingAppointmentList(String username, Patient[] pArray, Doctor[] dArray)
	{		
		// get current date
		LocalDate currentDate = LocalDate.now();
		// get current year
		int currentYear = currentDate.getYear();
		// get current month
		int currentMonth = currentDate.get(ChronoField.MONTH_OF_YEAR);
		// get current day
		int currentDay = currentDate.getDayOfMonth();
			
		Appointment [] appointment = getAppointmentList();
			
		// Initialized as null
		String user = null;
			
		// check for which user
		for(int i = 0; i < pArray.length;i++)
		{
			if(pArray[i].getUsername().equals(username))
				user = "patient";
				
		}
				
		for(int i = 0; i < dArray.length;i++)
		{
			if(dArray[i].getUsername().equals(username))
				user = "doctor";
		}		
		
		// Numbering for appointment list
		int num = 1;
		
		for(int i = 0; i < appointment.length; i++)
		{
			// patient
			if(user.equals("patient"))
			{
				if(i == 0)
				{	
					System.out.println(" ");
					System.out.printf("--------------------------------------------APPOINTMENT LIST---------------------------------------------\n");
					System.out.println("BIL  PATIENT NAME         DOCTOR NAME            APPOINTMENT ID      DATE        TIME SLOT");
					System.out.println("---------------------------------------------------------------------------------------------------------");
				}	
				if(appointment[i].getPatient().getUsername().equals(username) && ((currentYear == appointment[i].getYear() && currentMonth == appointment[i].getMonth() && currentDay < appointment[i].getDay()) ||	(currentYear == appointment[i].getYear() && currentMonth < appointment[i].getMonth()) || (currentYear < appointment[i].getYear())))
					{
						System.out.printf("%-5d%-21s%-23s%-20s%d/%d/%-5d%s\n", num, appointmentList.get(i).getPatient().getName(), 
							appointmentList.get(i).getDoctor().getName(), appointmentList.get(i).getApptId(),
							appointmentList.get(i).getYear(), appointmentList.get(i).getMonth(), appointmentList.get(i).getDay()
							, appointmentList.get(i).getTime(appointmentList.get(i).getSlot()));
					num++;
					}		
			}
			// doctor
			else if(user.equals("doctor"))
			{
				if(i == 0)
				{	
					System.out.println(" ");
					System.out.printf("--------------------------------------------APPOINTMENT LIST---------------------------------------------\n");
					System.out.println("BIL  PATIENT NAME         DOCTOR NAME            APPOINTMENT ID      DATE        TIME SLOT");
					System.out.println("---------------------------------------------------------------------------------------------------------");
				}
				if(appointment[i].getDoctor().getUsername().equals(username) && ((currentYear == appointment[i].getYear() && currentMonth == appointment[i].getMonth() && currentDay < appointment[i].getDay()) ||	(currentYear == appointment[i].getYear() && currentMonth < appointment[i].getMonth()) || (currentYear < appointment[i].getYear())))		
				{
					System.out.printf("%-5d%-21s%-23s%-20s%d/%d/%-5d%s\n", num, appointmentList.get(i).getPatient().getName(), 
							appointmentList.get(i).getDoctor().getName(), appointmentList.get(i).getApptId(),
							appointmentList.get(i).getYear(), appointmentList.get(i).getMonth(), appointmentList.get(i).getDay()
							, appointmentList.get(i).getTime(appointmentList.get(i).getSlot()));
						num++;
				}
			}
			// No result
			else
			{
				System.out.println("No pending appointment found!");
			}
		}

	}
	
	// Show past Appointment(done by Patient)
	public void pastApptPatientView(String username)
	{
		// get current date
		LocalDate currentDate = LocalDate.now();
		// get current year
		int currentYear = currentDate.getYear();
		// get current month
		int currentMonth = currentDate.get(ChronoField.MONTH_OF_YEAR);
		// get current day
		int currentDay = currentDate.getDayOfMonth();

			
		Appointment [] appointment = getAppointmentList();
						
		//to check if no matching result
		int indicator = 0;
			
		// Numbering for displaying the list
		int num = 1;
		
		// To display the header
		int j = 0;
		
		for(int i = 0; i < appointment.length;i++)
		{
			if(j == 0 && ((currentYear == appointment[i].getYear() && currentMonth == appointment[i].getMonth() && currentDay > appointment[i].getDay()) ||	(currentYear == appointment[i].getYear() && currentMonth > appointment[i].getMonth()) || (currentYear > appointment[i].getYear())) && appointment[i].getPatient().getUsername().equals(username))
			{	
				System.out.println(" ");
				System.out.printf("--------------------------------------------APPOINTMENT LIST---------------------------------------------\n");
				System.out.println("BIL  PATIENT NAME         DOCTOR NAME            APPOINTMENT ID      DATE        TIME SLOT");
				System.out.println("---------------------------------------------------------------------------------------------------------");
				j++;
			}
			
			//same year same month
		if(((currentYear == appointment[i].getYear() && currentMonth == appointment[i].getMonth() && currentDay > appointment[i].getDay()) ||	(currentYear == appointment[i].getYear() && currentMonth > appointment[i].getMonth()) || (currentYear > appointment[i].getYear())) && appointment[i].getPatient().getUsername().equals(username))
			{
			System.out.printf("%-5d%-21s%-23s%-20s%d/%d/%-5d%s\n", num, appointmentList.get(i).getPatient().getName(), 
					appointmentList.get(i).getDoctor().getName(), appointmentList.get(i).getApptId(),
					appointmentList.get(i).getYear(), appointmentList.get(i).getMonth(), appointmentList.get(i).getDay()
					, appointmentList.get(i).getTime(appointmentList.get(i).getSlot()));
				indicator++;
				num++;
			}									
		}
		if(indicator == 0) 
			System.out.println("\nNO APPOINTMENT HISTORY FOUND.");			
	}
	
	// Show past Appointment(Done by doctor)
	public void pastApptDoctorView(String username)
	{		
		// get current date
		LocalDate currentDate = LocalDate.now();
		// get current year
		int currentYear = currentDate.getYear();
		// get current month
		int currentMonth = currentDate.get(ChronoField.MONTH_OF_YEAR);
		// get current day
		int currentDay = currentDate.getDayOfMonth();
	
		Scanner input = new Scanner(System.in);
		Appointment [] appointment = getAppointmentList();
		System.out.print("PATIENT NAME: ");
						
		String pName = input.nextLine();
					
		//to check if no matching result
		int indicator = 0;
					
		// Numbering for displaying the list
		int num = 1;	
		
		// For displaying the header
		int j = 0;
		
		for(int i = 0; i < appointment.length;i++)
		{
			if(j == 0 && ((currentYear == appointment[i].getYear() && currentMonth == appointment[i].getMonth() && currentDay > appointment[i].getDay()) ||	(currentYear == appointment[i].getYear() && currentMonth > appointment[i].getMonth()) || (currentYear > appointment[i].getYear())) && appointment[i].getDoctor().getUsername().equals(username) && appointment[i].getPatient().getName().equals(pName))
			{	
				System.out.println(" ");
				System.out.printf("--------------------------------------------APPOINTMENT LIST---------------------------------------------\n");
				System.out.println("BIL  PATIENT NAME         DOCTOR NAME            APPOINTMENT ID      DATE        TIME SLOT");
				System.out.println("---------------------------------------------------------------------------------------------------------");
				j++;
			}
			
			if(((currentYear == appointment[i].getYear() && currentMonth == appointment[i].getMonth() && currentDay > appointment[i].getDay()) ||	(currentYear == appointment[i].getYear() && currentMonth > appointment[i].getMonth()) || (currentYear > appointment[i].getYear())) && appointment[i].getDoctor().getUsername().equals(username) && appointment[i].getPatient().getName().equals(pName))
			{
				System.out.printf("%-5d%-21s%-23s%-20s%d/%d/%-5d%s\n", num, appointmentList.get(i).getPatient().getName(), 
						appointmentList.get(i).getDoctor().getName(), appointmentList.get(i).getApptId(),
						appointmentList.get(i).getYear(), appointmentList.get(i).getMonth(), appointmentList.get(i).getDay()
						, appointmentList.get(i).getTime(appointmentList.get(i).getSlot()));
					num++;
					indicator++;
			}
		}
		if(indicator == 0) 
			System.out.println("\nNO APPOINTMENT HISTORY FOUND.");		
						
	}

	// Find appointment by apptId 
	public Appointment findAppointment(String apptId)
	{
				
		Appointment appt = null;
		boolean found = false;
				
		int i =0;
		int count = getNumberOfAppointment();
				
		while(i< count && !found)
		{
			appt = appointmentList.get(i);
					
			if(appt.getApptId().equals(apptId))
				found = true;
			else 
				i++;
		}
		if (found)
			return appt;
		else 
			return null;
	}
	
	// Remove an Appointment from array list 
	public void removeAppointment(Appointment a)
	{
		appointmentList.remove(a);
	}
	
	// Read appointment list from textfile
	public void inputAppointmentList(PatientList p, DoctorList d, Patient[] pa, Doctor[] doc)
	{
		try
		{
			// import Appointment text file
			File aptFile = new File("Appointments.txt");
			Scanner inputFile = new Scanner(aptFile);
			while(inputFile.hasNext())
			{
				String readData = inputFile.nextLine();
				StringTokenizer token = new StringTokenizer(readData, "|");				
				
				String inPatientName = token.nextToken();
				String inDocName = token.nextToken();
				String inId = token.nextToken();
				int inYear = Integer.parseInt(token.nextToken());
				int inMonth = Integer.parseInt(token.nextToken());
				int inDay = Integer.parseInt(token.nextToken());
				int inSlot = Integer.parseInt(token.nextToken());
								
				// initialize (need to change later)
				Patient inPatient = null;
				Doctor inDoctor = null;
				
				// to find Patient object with Patient name
				for(int i = 0; i < pa.length;i++)
				{
					if(pa[i].getName().equals(inPatientName))
						inPatient =  p.findPatient(inPatientName);
				}
				
				// to find Doctor object with Doctor name
				for(int i = 0; i < doc.length;i++)
				{
					if(doc[i].getName().equals(inDocName))
						inDoctor =  d.findDoctor(inDocName);
				}
				
				// Add appointment list from text file into array list 
				Appointment inAppointment = new Appointment(inId, inPatient, inDoctor, inYear, inMonth, inDay, inSlot);
				recordAppointment(inAppointment);

			}
			inputFile.close();
		}
		catch(FileNotFoundException e)
		{
		 System.out.println("Error opening Appointment file");
		}
	}
	
	// Book new Appointment
		public void newAppointment(PatientList p, DoctorList d, Patient[] pArray, Doctor[] dArray, String PatientName)
		{
			int year = 2021;
			int month = 1;
			int day = 1;
			Scanner input = new Scanner(System.in);	
			boolean invalid = true;
					
			// get current date
			LocalDate currentDate = LocalDate.now();
			// get current year
			int currentYear = currentDate.getYear();
			// get current month
			int currentMonth = currentDate.get(ChronoField.MONTH_OF_YEAR);
			// get current day
			int currentDay = currentDate.getDayOfMonth();
			String doc, pa;
					
			// If the user is patient
			if(p.findPatient(PatientName) != null)
			{
				System.out.println(" ");
				System.out.println("--NEW APPOINTMENT--");
				Patient patient =  p.findPatient(PatientName);
				// data validation for existing doctor
				do
				{
					System.out.print("Please enter doctor name: ");
					doc = input.nextLine();
					if(d.findDoctor(doc) == null)
						System.out.println("This doctor name not found.");
				}while(d.findDoctor(doc) == null);
							
				do
				{
					try
					{
						System.out.print("Please enter year(20XX): ");
						year = Integer.parseInt(input.nextLine());
						if(year < currentYear)
							System.out.println("Invalid year. Only input " + currentYear + " or later. Try again.");
						invalid = false;
					}
					catch(NumberFormatException e)
					{
						System.out.println("Invalid input. Please enter numbers only. Try again.");
					}
					
				} while(year < currentYear || invalid); 

				// re-initialising invalid boolean
				invalid = true;
				do
				{
					try
					{
						System.out.print("Please enter month(mm): ");
						month = Integer.parseInt(input.nextLine());
						if(year == currentYear && month < currentMonth || month < 1 || month > 12)
							System.out.println("Invalid month. Please book for future dates only. Try again.");
						invalid = false;
					}
					catch(NumberFormatException e)
					{
						System.out.println("Invalid input. Please enter numbers only. Try again.");
					}
				} while(year == currentYear && month < currentMonth || month < 1 || month > 12 || invalid);

				// re-initialising invalid boolean
				invalid = true;
				do
				{
					try
					{
						System.out.print("Please enter day(dd) (we only work until the 28th of every month): ");
						day = Integer.parseInt(input.nextLine());
						if(year == currentYear && month == currentMonth && day < currentDay || day < 1 || day > 28)
							System.out.println("Invalid day. Please book for future dates only. Try again.");
						invalid = false;
					}
					catch(NumberFormatException e)
					{
						System.out.println("Invalid input. Please enter numbers only. Try again.");
					}
					
				}while(year == currentYear && month == currentMonth && day < currentDay || day < 1 || day > 28 || invalid);
							
				Doctor doctor = null;
							
				// to find Doctor object with Doctor name
				for(int i = 0; i < dArray.length;i++)
				{
					if(dArray[i].getName().equals(doc))
						doctor =  d.findDoctor(doc);
				}
							
				boolean[] availableSlots = Appointment.showFreeSlots(doctor, year, month, day, getAppointmentList());
				int slot = 1;
				
				// re-initialising invalid boolean
				invalid = true;
				do
				{
					try
					{
						System.out.print("Select a time slot(available slot numbers only): ");
						slot = Integer.parseInt(input.nextLine());	
						{
							if(slot > 5 || slot < 1 || !availableSlots[slot - 1])
							{
									System.out.println("Slot unavailable. Select available slot numbers only. Try again! ");
							}
						}
						invalid = false;
					}
					catch(NumberFormatException e)
					{
						System.out.println("Invalid input. Select available slot numbers only. Try again! ");
					}
					

				}while(slot > 5 || slot < 1 || !availableSlots[slot - 1] || invalid);
						
							
				String apptId = Appointment.generateId(month, day, year);
									
				Appointment newAppt = new Appointment(apptId, patient, doctor, year, month, day, slot);
				recordAppointment(newAppt);
				System.out.println("\nSuccessfully booked Appointment!");
							
			}
					
			// If the user is Admin
			else
			{
				System.out.println(" ");
				System.out.println("--NEW APPOINTMENT--");
				// data validation for existing patient
				do
				{
					System.out.print("Please enter patient name: ");
					pa = input.nextLine();
					if(p.findPatient(pa) == null)
						System.out.println("This patient name not found");
				}while(p.findPatient(pa) == null);

				// data validation for existing doctor
				do
				{
					System.out.print("Please enter doctor name: ");
					doc = input.nextLine();
					if(d.findDoctor(doc) == null)
						System.out.println("This doctor name not found");
				}while(d.findDoctor(doc) == null);
				
				// re-initialising invalid boolean
				invalid = true;
				do
				{
					try
					{
						System.out.print("Please enter year(20XX): ");
						year = Integer.parseInt(input.nextLine());
						if(year < currentYear)
							System.out.println("Invalid year. Only input " + currentYear + " or later. Try again.");
						invalid = false;
					}
					catch(NumberFormatException e)
					{
						System.out.println("Invalid input. Please enter numbers only. Try again.");
					}
		
				} while(year < currentYear || invalid); 

				// re-initialising invalid boolean
				invalid = true;
				do
				{
					try
					{
						System.out.print("Please enter month(mm): ");
						month = Integer.parseInt(input.nextLine());
						if(year == currentYear && month < currentMonth || month < 1 || month > 12)
							System.out.println("Invalid month. Please book for future dates only. Try again.");
						invalid = false;
					}
					catch(NumberFormatException e)
					{
						System.out.println("Invalid input. Please enter numbers only. Try again.");
					}
				} while(year == currentYear && month < currentMonth || month < 1 || month > 12 || invalid);

				// re-initialising invalid boolean
				invalid = true;
				do
				{
					try
					{
						System.out.print("Please enter day(dd) (we only work until the 28th of every month): ");
						day = Integer.parseInt(input.nextLine());
						if(year == currentYear && month == currentMonth && day < currentDay || day < 1 || day > 28)
							System.out.println("Invalid day. Please book for future dates only. Try again.");
						invalid = false;
					}
					catch(NumberFormatException e)
					{
						System.out.println("Invalid input. Please enter numbers only. Try again.");
					}
					
				}while(year == currentYear && month == currentMonth && day < currentDay || day < 1 || day > 28 || invalid);
						
				// initialize patient and doctor
				Patient patient = null;
				Doctor doctor = null;
					
				// to find Doctor object with Doctor name
				for(int i = 0; i < dArray.length;i++)
				{
					if(dArray[i].getName().equals(doc))
						doctor =  d.findDoctor(doc);
				}
						
				// to find Doctor object with Doctor name
				for(int i = 0; i < pArray.length;i++)
				{
					if(pArray[i].getName().equals(pa))
						patient =  p.findPatient(pa);
				}
									
				boolean[] availableSlots = Appointment.showFreeSlots(doctor, year, month, day, getAppointmentList());
				int slot = 1;
				invalid = true;
				do
				{
					try
					{
						System.out.print("Select a time slot(available slot numbers only): ");
						slot = Integer.parseInt(input.nextLine());	
						{
							if(slot > 5 || slot < 1 || !availableSlots[slot - 1])
							{
									System.out.println("Slot unavailable. Select available slot numbers only. Try again: ");
							}
						}
						invalid = false;
					}
					catch(NumberFormatException e)
					{
						System.out.println("Invalid input. Select available slot numbers only. Try again: ");
					}
					

				}while(slot > 5 || slot < 1 || !availableSlots[slot - 1] || invalid);					
				String apptId = Appointment.generateId(month, day, year);
						
				Appointment newAppt = new Appointment(apptId, patient, doctor, year, month, day, slot);
				recordAppointment(newAppt);
				System.out.println("\nSuccessfully booked Appointment!");
			}
		}
	
	// Cancel an Appointment
	public void cancelAppointment()
	{
		System.out.println("\n--Cancel Appointment--");
		
		Scanner input = new Scanner (System.in);
		System.out.print("Please enter appointment ID: ");
		String apptId = input.nextLine().toUpperCase();
		
		if(findAppointment(apptId) == null)
		{
			System.out.println("This appointment ID not found");
		}
		else
		{
			removeAppointment(findAppointment(apptId));
			System.out.println("Sucessfully cancelled Appointment!");
		}
		
	}
	
	public void outputApptList() 
	{			
		try
		{
			File outFile = new File("Appointments.txt");
			PrintWriter outputFile = new PrintWriter(outFile);
				
			for(int i = 0; i < appointmentList.size(); i++)
			{
				outputFile.println(appointmentList.get(i).getPatient().getName() + "|" + 
						appointmentList.get(i).getDoctor().getName() + "|" +
						appointmentList.get(i).getApptId() + "|" +
						appointmentList.get(i).getYear() + "|" +
						appointmentList.get(i).getMonth() + "|" +
						appointmentList.get(i).getDay() + "|" +
						appointmentList.get(i).getSlot());
			}
			outputFile.close();
		}
		catch(FileNotFoundException e)
		{
			System.out.println("Error opening Appointments file");
		}
	}
}
