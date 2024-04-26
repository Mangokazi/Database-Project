import pandas as pd
import plotly.express as px
import dash
from dash import dcc, html, dash_table
from dash.dependencies import Input, Output
import dash_bootstrap_components as dbc

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
    title='Comparison of Diagnoses'
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
    title='Comparison of Chronic Diseases'
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
    title='Comparison of Causes'
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
    barmode='stack'
)

# Initialize the Dash app
app = dash.Dash(__name__, external_stylesheets=[dbc.themes.BOOTSTRAP])

# Define the layout of the Dash app
app.layout = html.Div([
    html.H1("Comparison of Health Data", style={'textAlign': 'center'}),
    dbc.Row([
        dbc.Col(
            dcc.Graph(figure=fig_diagnosis),
            width={'size': 6, 'offset': 0}
        ),
        dbc.Col(
            dcc.Graph(figure=fig_diseases),
            width={'size': 6, 'offset': 0}
        )
    ]),
    html.Hr(),  # Add a horizontal line
    dbc.Row([
        dbc.Col(
            dcc.Graph(figure=fig_causes),
            width={'size': 6, 'offset': 0}
        ),
        dbc.Col(
            dcc.Graph(figure=fig_stacked_bar),
            width={'size': 6, 'offset': 0}
        )
    ])
])

# Run the Dash app
if __name__ == '__main__':
    app.run_server(debug=True)