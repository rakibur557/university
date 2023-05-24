import.java.util.Scanner;
public class FCFS{
    
public static void main(String[]arg){
    
System.out.println("Enter the number processes");
Scanner in = new Scanner(System.in);
int number0 Processes = in.nextInt();
int pid[] = new int [number0 Processes];
int bt[] = new int [number0 Processes];
int ar[] = new int [number0 Processes];
int ct[] = new int [number0 Processes];
int ta[] = new int [number0 Processes];
int wt[] = new int [number0 Processes];
for(int i=0;i< number0 Processes;i++){
    
System.out.println("Enter process"+(i+1)+"arrival time: ");
ar[i]=in.nextInt();

System.out.println("Enter process"+(i+1)+"burst time: ");
bt[i]=in.nextInt();
pid[i]=i+1;
}
int temp;
for(int i=0;i<number0 Processes;i++){
    
for(int j=i+1;j<number0 Processes;j++){
    
if(ar[i]>ar[j]){
    
temp=ar[i];
ar[i]=ar[j];
ar[j]=temp;

temp=pid[i];
pid[i]=ar[j];
pid[j]=temp;

temp=bt[i];
bt[i]=ar[j];
bt[j]=temp;
}
}
}
System.out.println();
ct[0]=bt[0]+ar[0];
for(int i=1;i<number0 Processes;i++){
    
ct[i]=ct[i-1]+bt[i];
}

for(int i=1;i<number0 Processes;i++){
    ta[i]=ct[i]-ar[i];
    wt[i]=ta[i]-bt[i];
}
System.out.println("Processes\t\tAT\t\tBT\t\tCT\t\tTAT\t\tWT");
for(int i=0;i<number0 Processes;i++){
    
System.out.println(pid[i]+"\t\t\t"+ar[i]+"\t\t"+bt[i]+"\t\t+"+ct[i]+"\t\t"+ta[i]+"\t\t"+wt[i]);
}
System.out.println("gantt chart: ");
for(int i=0;i<number0 Processes;i++){
    
System.out.print("p"+pid[i]+" ");
}
}
}
