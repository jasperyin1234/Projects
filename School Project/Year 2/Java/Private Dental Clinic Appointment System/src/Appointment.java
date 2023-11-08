public class Appointment
{
	// Appointment Patient 
	private Patient patient;
	public Patient getPatient()
	{
		return patient;
	}
	
	// Appointment Doctor
	private Doctor doctor;
	public Doctor getDoctor()
	{
		return doctor;
	}
	
	// Appointment ID
	private String apptId;
	public String getApptId()
	{
		return apptId;
	}
	
	// Appointment year
	private int year;
	public int getYear()
	{
		return year;
	}
	
	// Appointment month
	private int month;
	public int getMonth()
	{
		return month;
	}
	
	// Appointment day
	private int day;
	public int getDay()
	{
		return day;
	}
	
	// Appointment time slot
	private int slot;
	public int getSlot()
	{
		return slot;
	}
	
	// Get the time slot of appointment 
	public String getTime(int slot)
	{
		// Initialize
		String time = "(1) 10:00AM - 11:00AM"; 
		switch(slot)
		{
		case 1:
			time = "(1) 10:00AM - 11:00AM";
			break;
		case 2:
			time = "(2) 11:00AM - 12:00PM";
			break;
		case 3:
			time = "(3) 1:00PM - 2:00PM";
			break;
		case 4:
			time = "(4) 2:00PM - 3:00PM";
			break;
		case 5:
			time = "(5) 3:00PM - 4:00PM";
			break;
		}
			return time;
	}
	
	// Constructor
	public Appointment(String apptId, Patient patient, Doctor doctor, int year, int month, int day, int slot)
	{
		this.apptId = apptId;
		this.patient = patient;
		this.doctor = doctor;
		this.year = year;
		this.month = month;
		this.day = day;
		this.slot = slot;
	}
	
	// Generate Appointment ID 
	public static String generateId(int month, int day, int year)
	{
		return "DAID" + Integer.toString(year) + Integer.toString(month)+ Integer.toString(day);
	}
	
	// Display open slots for user
	public static boolean[] showFreeSlots(Doctor doctor, int year, int month, int day, Appointment[] aArray)
	{
		// 5 slots 
		boolean[] availableSlots = {true, true, true, true, true};
			
		// Mark booked slots as unavailable
		for (int i = 0; i < aArray.length; i++) 
		{
			Appointment appointment = aArray[i];
			if (appointment.doctor != doctor || appointment.year != year || appointment.month != month || appointment.day != day)
			{
				continue;		
			}
			availableSlots[appointment.slot - 1] = false;
		}
			
		// Check for Unavailable day
		int count = 0;
		for (boolean slot : availableSlots)
		{
			if (!slot) // if it's not true
				count++;
		}
			
		if(count == 5)
			System.out.println("This day is unavailable for your chosen Doctor. Select a different day.");
		else
		{
				
			// Print available slots
			System.out.println("Available slots are: ");
			for (int i = 0; i < availableSlots.length; i++)
			{
				if( availableSlots[i] == true)
				{
					switch(i)
					{
					case 0:
						System.out.println("(1) 10:00AM - 11:00AM");
						break;
					case 1:
						System.out.println("(2) 11:00AM - 12:00PM");
						break;
					case 2:
						System.out.println("(3) 1:00PM - 2:00PM");
						break;
					case 3:
						System.out.println("(4) 2:00PM - 3:00PM");
						break;
					case 4:
						System.out.println("(5) 3:00PM - 4:00PM");
					}
				}
					
			}
		}	
		return availableSlots;
			
	}

	// Appointment details 
	public String toString()
	{
		String time = "(0) 10.00am - 11.00am"; // initialise
		switch(slot)
		{
		case 0:
			time = "(1) 10:00AM - 11:00AM";
			break;
		case 1:
			time = "(2) 11:00AM - 12:00PM";
			break;
		case 2:
			time = "(3) 1:00PM - 2:00PM";
			break;
		case 3:
			time = "(4) 2:00PM - 3:00PM";
			break;
		case 4:
			time = "(5) 3:00PM - 4:00PM";
		}
		return "Patient: " + patient.getName() + "\nDoctor: Dr." + doctor.getName() + "\nAppointment ID: " + apptId + "\nDate: " + Integer.toString(day) + "/" + Integer.toString(month) + "/" + Integer.toString(year) + "\nTime Slot: " + time;
		
	}
	
}
