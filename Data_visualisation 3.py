import pandas as pd
import matplotlib.pyplot as plt
import seaborn as sns
import ipywidgets as widgets
from IPython.display import display
import plotly.express as px
import dash
from dash import dcc, html, dash_table
from dash.dependencies import Input, Output
import dash_bootstrap_components as dbc

# Define the Dash app instance
app = dash.Dash(__name__, external_stylesheets=[dbc.themes.BOOTSTRAP])

# Read the CSV file into a DataFrame
df = pd.read_csv('patient.csv')

# Convert the "date" column to datetime format
df['date'] = pd.to_datetime(df['date'])

# Create a new column to show only the days
df['days'] = df['date'].dt.day

# Filter the DataFrame for HIV and Cancer diagnoses
hiv_df = df[df['diagnosis'] == 'HIV']
cancer_df = df[df['diagnosis'] == 'Cancer']

# Group by days and count the number of HIV and Cancer diagnoses per day
hiv_count = hiv_df.groupby('days').size().reset_index(name='hiv_count')
cancer_count = cancer_df.groupby('days').size().reset_index(name='cancer_count')

# Calculate the rate of HIV and Cancer diagnoses per day for each gender
hiv_rate_by_gender = hiv_df.groupby(['days', 'gender']).size().unstack(fill_value=0)
hiv_rate_by_gender['total'] = hiv_rate_by_gender.sum(axis=1)
hiv_rate_by_gender['rate'] = hiv_rate_by_gender['total'] / hiv_rate_by_gender['total'].sum()

cancer_rate_by_gender = cancer_df.groupby(['days', 'gender']).size().unstack(fill_value=0)
cancer_rate_by_gender['total'] = cancer_rate_by_gender.sum(axis=1)
cancer_rate_by_gender['rate'] = cancer_rate_by_gender['total'] / cancer_rate_by_gender['total'].sum()

# Dropdown widget
dropdown = widgets.Dropdown(
    options=['Bar Graph', 'Line Graph'],
    value='Bar Graph',
    description='Graph Type:',
    disabled=False,
)

# Function to update the plot based on the selected graph type
def update_plot(graph_type):
    plt.figure(figsize=(12, 6))
    
    if graph_type == 'Bar Graph':
        # Bar graph for trend of HIV diagnoses over days
        sns.barplot(x='days', y='count', data=hiv_count, color='skyblue')
        plt.xlabel('Days')
        plt.ylabel('Number of HIV Diagnoses')
        plt.title('Trend of HIV Diagnoses over Days')
    elif graph_type == 'Line Graph':
        # Line graph for relationship between gender and rate of HIV diagnoses over days
        hiv_rate_by_gender[['rate']].plot(color='red', figsize=(10, 6))
        plt.ylabel('Rate of HIV Diagnoses')
        plt.xlabel('Days')
        plt.legend(loc='upper right', bbox_to_anchor=(1.0, 1.0))
        plt.title('Relationship between Gender and Rate of HIV Diagnoses over Days')
    
    plt.show()

# Read the CSV files into DataFrames
df_patient = pd.read_csv('patient.csv')
df_survey = pd.read_csv('survey.csv')

# Convert 'dob' column to datetime, coercing errors
df_patient['dob'] = pd.to_datetime(df_patient['dob'], errors='coerce')

# Calculate current date
current_date = pd.Timestamp('now')

# Calculate age by subtracting the year of birth from the current year
df_patient['age'] = current_date.year - df_patient['dob'].dt.year

# Count the occurrences of each diagnosis category
diagnosis_counts = df_patient['diagnosis'].str.lower().value_counts()

# Create a DataFrame containing the counts for each diagnosis
diagnosis_counts_df = pd.DataFrame({
    'Diagnosis': ['Diabetic', 'Cancer', 'HIV', 'TB', 'Arthritis', 'Asthma', 'Hypertension'],
    'Number_of_patients': [diagnosis_counts.get('diabetic', 0),
                            diagnosis_counts.get('cancer', 0),
                            diagnosis_counts.get('hiv', 0),
                            diagnosis_counts.get('tb', 0),
                            diagnosis_counts.get('arthritis', 0),
                            diagnosis_counts.get('asthma', 0),
                            diagnosis_counts.get('hypertension', 0)]
})

fig_diagnosis = px.bar(
    diagnosis_counts_df,
    x='Diagnosis',
    y='Number_of_patients',
    title='Comparison of Diagnoses',
    width=550,
    height=400
)

# Update the layout to adjust the size of the bar chart
fig_diagnosis.update_layout(
    width=550,  # Set the width of the figure
    height=400,  # Set the height of the figure
)

# Count the occurrences of each disease category
disease_counts = df_survey['chronic_desease_list'].str.lower().value_counts()

# Create a DataFrame containing the counts for chronic diseases
disease_counts_df = pd.DataFrame({
    'Disease': ['High_blood_pressure', 'Cancer', 'Arthritis', 'Asthma', 'Other'],
    'Count': [disease_counts.get('high_blood_pressure', 0),
              disease_counts.get('cancer', 0),
              disease_counts.get('arthritis', 0),
              disease_counts.get('asthma', 0),
              disease_counts.sum() - disease_counts.get('high_blood_pressure', 0) -
              disease_counts.get('cancer', 0) - disease_counts.get('arthritis', 0) -
              disease_counts.get('asthma', 0)]
})

# Create a pie chart for chronic diseases using Plotly Express
fig_diseases = px.pie(
    disease_counts_df,
    values='Count',
    names='Disease',
    title='Comparison of Chronic Diseases',
    width=550,
    height=400
)

# Count the occurrences of each cause category
cause_counts = df_survey['causes'].str.lower().value_counts()

# Create a DataFrame containing the counts for causes
cause_counts_df = pd.DataFrame({
    'Cause': ['Transportation', 'Financial Constraints', 'Denial Diagnosis', 'Other'],
    'Count': [cause_counts.get('transportation', 0),
              cause_counts.get('financial_constraints', 0),
              cause_counts.get('denial_diagnosis', 0),
              cause_counts.sum() - cause_counts.get('transportation', 0) -
              cause_counts.get('financial_constraints', 0) -
              cause_counts.get('denial_diagnosis', 0)]
})

# Create a pie chart for causes using Plotly Express
fig_causes = px.pie(
    cause_counts_df,
    values='Count',
    names='Cause',
    title='Comparison of Causes',
    width=550,
    height=400
)

# Group the DataFrame by 'age' and 'gender' and count the occurrences
gender_age_counts = df_patient.groupby(['age', 'gender']).size().reset_index(name='count')

# Create a stacked bar graph for gender by age using Plotly Express
fig_stacked_bar = px.bar(
    gender_age_counts,
    x='age',
    y='count',
    color='gender',
    title='Stacked Bar Graph of Age by Gender',
    labels={'age': 'Age', 'count': 'Count', 'gender': 'Gender'},
    barmode='stack',
    width=550,
    height=400
)

# Read the CSV file into a DataFrame for reasons for defaulting patients
df_reasons_defaulting = pd.read_csv('survey.csv')

# Calculate the counts of each reason in the "defaulted_reasons" column
reason_counts = df_reasons_defaulting['defaulted_reasons'].value_counts()

# Create a DataFrame for the counts of each reason
reason_counts_df = pd.DataFrame({'Reason': reason_counts.index, 'Rate': reason_counts.values})

# Read the CSV file into a DataFrame
df = pd.read_csv('survey.csv')

# Count the occurrences of 'yes' and 'no' in the 'defaulted_reasons' column
affected_counts = df['defaulted_reasons'].value_counts()

# Create a DataFrame for the counts of affected and not affected
affected_counts_df = pd.DataFrame({'Status': affected_counts.index, 'Count': affected_counts.values})

# Define the layout of the Dash app
app.layout = html.Div([
    html.H1("Comparison of Health Data", style={'textAlign': 'center'}),
    dbc.Row([
        dbc.Col(
            dcc.Graph(id='fig-diagnosis', figure=fig_diagnosis),
            width={'size': 6, 'offset': 0}
        ),
        dbc.Col(
            dcc.Graph(id='fig-diseases', figure=fig_diseases),
            width={'size': 6, 'offset': 0}
        )
    ]),
    html.Hr(),  # Add a horizontal line
    dbc.Row([
        dbc.Col(
            dcc.Graph(id='fig-causes', figure=fig_causes),
            width={'size': 6, 'offset': 0}
        ),
        dbc.Col(
            dcc.Graph(id='fig-stacked-bar', figure=fig_stacked_bar),
            width={'size': 6, 'offset': 0}
        )
    ]),
    html.Hr(),  # Add a horizontal line
    dbc.Row([
        dbc.Col(
            dcc.Graph(id='reasons-bar-graph',
                      figure=px.bar(
                          reason_counts_df,
                          x='Reason',
                          y='Rate',
                          title='Reasons for Defaulting Patients'
                      ).update_layout(
                          width=550,  # Set the width of the graph
                          height=400,  # Set the height of the graph
                          margin=dict(l=40, r=40, t=40, b=40)  # Adjust the margins
                      )),
            width={'size': 6, 'offset': 0}
        ),
        dbc.Col(
            dcc.Graph(
                id='affected-pie-chart',
                figure=px.pie(affected_counts_df, values='Count', names='Status', title='Affected Status Distribution')
                    .update_layout(
                        width=550,  # Set the width of the pie chart
                        height=400,  # Set the height of the pie chart
                        margin=dict(l=40, r=40, t=40, b=40)  # Adjust the margins
                    )
            ),
            width={'size': 6, 'offset': 0}
        )
    ]),
    html.Div([
        dcc.Link('Back', href='http://localhost/Database-project/Patient.php', target='_blank', style={
            'width': '200px',
            'background-color': 'white',
            'color': 'black',
            'border': '2px solid #349E97',
            'position': 'absolute',
            'border-radius': '10px',
            'padding': '10px',
            'margin-top': '15px',
            'margin-left': '15px',
            'text-align': 'center',
            'textDecoration': 'none'
        })
    ])
])

# Run the Dash app
if __name__ == '__main__':
    app.run_server(debug=True)
